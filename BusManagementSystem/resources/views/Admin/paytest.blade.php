<h3>Buy Borsa for 100.00 ETB</h3>
<form action="{{ route('makePayment') }}" method="POST">
    @csrf
    <input type="text" name="amount" placeholder="Amount">
    <input type="text" name="email" placeholder="email">
    <input type="text" name="first_name" placeholder="first_name">
    <input type="text" name="last_name" placeholder="last_name">
    <input type="text" name="phone" placeholder="phone">

    <!-- Add more input fields for other data -->
    <button type="submit">Make Payment</button>
</form>
