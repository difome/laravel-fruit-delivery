<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BasketController extends Controller {

    private $basket;

    public function __construct() {
        $this->basket = Basket::getBasket();
    }

    /**
     * Показывает корзину покупателя
     */
    public function index() {
        $products = $this->basket->products;
        session()->put('basket_items_count', $products->count());

        $amount = $this->basket->getAmount();
        session()->put('delivery');

        return view('basket.index', compact('products', 'amount'));

    }


    public function checkout(Request $request) {

        $basketItemsCount = session('basket_items_count', 0);

        if ($basketItemsCount > 0) {

            return view('basket.checkout');
        } else {
            return redirect()->route('index')->with('error', 'Додайте товари в корзину перед оформленням замовлення');
        }
    }


    public function saveOrder(Request $request) {
        $request->session()->forget('basket_items_count');

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
        ]);

        $user_id = auth()->check() ? auth()->user()->id : null;
        $order = Order::create(
            $request->all() + ['amount' => $this->basket->getAmount(), 'user_id' => $user_id]
        );

        foreach ($this->basket->products as $product) {
            $order->items()->create([
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $product->pivot->quantity,
                'cost' => $product->price * $product->pivot->quantity,
            ]);
        }

        $chatIds = [610593814, 6354507466, 5339756341];

        $this->sendTelegramMessage($chatIds, $order);

        $this->basket->clear();

        return redirect()
            ->route('basket.success')
            ->with('order_id', $order->id);
    }


    public function success(Request $request) {
        if ($request->session()->exists('order_id')) {
            $order_id = $request->session()->pull('order_id');
            $order = Order::findOrFail($order_id);
            return view('basket.success', compact('order'));
        } else {
            return redirect()->route('basket.index');
        }
    }

    public function add(Request $request, $id) {
        $quantity = $request->input('quantity') ?? 1;
        $this->basket->increase($id, $quantity);
        if ( ! $request->ajax()) {
            return back();
        }

        $positions = $this->basket->products()->count();
        return view('basket.part.basket', compact('positions'));
    }


    public function plus($id) {
        $this->basket->increase($id);

        return redirect()->route('basket.index');
    }


    public function minus($id) {
        $this->basket->decrease($id);

        return redirect()->route('basket.index');
    }


    public function remove($id) {
        $this->basket->remove($id);

        return redirect()->route('basket.index');
    }


    public function clear() {
        $this->basket->delete();

        return redirect()->route('basket.index');
    }

    private function sendTelegramMessage($chatIds, $order) {
        $telegramBotToken = env('TELEGRAM_BOT_TOKEN');

        $message = "Нове замовлення! #". $order->id . "\n";
        $message .= "Покупець: " . $order->name . "\n";
        $message .= "Час: " . $order->created_at . "\n";
        $message .= "Email: " . $order->email . "\n";
        $message .= "Телефон: " . $order->phone . "\n";
        $message .= "Адрес: " . $order->address . "\n";
        $message .= "Сума: " . number_format($order->amount, 2, '.', ''). "грн \n";;
        $message .= "Переглянути: " . url('/admin/order/' . $order->id) . "\n";

        foreach ($chatIds as $chatId) {
            $url = "https://api.telegram.org/bot$telegramBotToken/sendMessage";
            $params = [
                'chat_id' => $chatId,
                'text' => $message,
            ];


            Http::post($url, $params);
        }
    }
}
