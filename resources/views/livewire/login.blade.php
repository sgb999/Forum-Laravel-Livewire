<div>
    <h1>Login to account</h1>
    <form wire:submit.prevent="login">
        @csrf
    <div class="form-group">
        <label>E-mail</label>
        <input class="form-control" type="email" wire:model="email" placeholder="example@example.com" minlength="8" value="{{ old('email') }}" maxlength="255" required>
        @error('email') <span class="alert alert-danger">{{ $message }}</span> @enderror
        @if (session()->has('login'))
            <div class="alert alert-danger">
                {{ session('login') }}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label>Password</label>
        <input class="form-control" type="password" wire:model="password" placeholder="minimum 8 characters"  maxlength="255" required>
        @error('password') <span class="alert-danger">{{ $message }}</span> @enderror
    </div>
    <p></p>
    <button @if(empty($this->email) || empty($this->password)) disabled @endif class="btn btn-primary" type="submit">Log in</button>
    </form>
</div>
