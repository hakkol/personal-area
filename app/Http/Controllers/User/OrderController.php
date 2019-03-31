<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Http\Requests\SaveOrderRequest;

use App\Helpers\MailHelper;

use App\Models\{
    Order,
    Product,
    Status
};

use App\Services\OrderService;

class OrderController extends Controller
{
    protected $mailHelper;
    protected $orderService;

    public function __construct(MailHelper $mailHelper, OrderService $orderService)
    {
        $this->mailHelper = $mailHelper;
        $this->orderService = $orderService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();

        $orders = Order::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('user.orders.index', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SaveOrderRequest  $request
     * @return void
     */
    public function store(SaveOrderRequest $request)
    {
        $status = Status::where('name', 'processing')->first();

        if (!$status) {
            \Log::error('Status not found. User\OrderController store');

            return abort(500, 'Server error');
        }

        $product = Product::find($request->product);

        $this->authorize('visible', $product);

        $user = \Auth::user();

        $this->orderService->store([
            'user'      => $user,
            'product'   => $product,
            'status_id' => $status->id,
        ]);

        $this->mailHelper->newOrder($user->email);
    }
}
