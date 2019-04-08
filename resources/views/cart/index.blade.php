<div class="container">
    @if (Auth::check();)
    <div class="pagetitle"> <h1>{{ Auth::user()->name; . "'s" }} Cart</h1></div>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Quantity</th>
                    <th>Pack</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price Each</th>
                    <th>Item Total</th>
                </tr>
            </thead>

            <tbody>
                @foreach($cart->items as $item)
                <td>{{ $cart->item->quantity }}</td>
                <td>{{ $cart->item->qty_per_pack }}</td>
                <td>{{ $cart->item->image }}</td>
                <td>{{ $cart->item->name }}</td>
                <td>{{ $cart->item->price }}</td>
                <td>{{ $cart->itemTotal = $cart->item->price * $cart->item->quantity }}</td>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" aria-colspan="4">Total":</td>
                    <td>{{ $cart->total }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
