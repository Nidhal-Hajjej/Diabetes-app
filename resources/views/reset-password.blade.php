<!-- resources/views/reset-password.blade.php -->

<form action="/reset-password" method="post">
    @csrf
    <input type="hidden" name="token" value="{{ $request->token }}">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
    
    <label for="password">New Password:</label>
    <input type="password" id="password" name="password" required>
    
    <label for="password_confirmation">Confirm New Password:</label>
    <input type="password" id="password_confirmation" name="password_confirmation" required>
    
    <button type="submit">Reset Password</button>
</form>
