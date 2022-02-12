<div class="container">
    <h1>Login to account</h1>
    <form wire:submit.prevent="login">
    <div class="form-group">
                <label>E-mail</label>
            <input class="form-control" type="email"  wire:model.lazy="email" placeholder="example@example.com" minlength="8" value="{{ old('email') }}" maxlength="255" required>
            </div>
        @error('email') <span class="alert alert-danger">{{ $message }}</span> @enderror
        @if (session()->has('login'))
            <div class="alert alert-danger">
                {{ session('login') }}
            </div>
        @endif
    <div class="form-group">
        <label>Password</label>
            <input class="form-control" type="password" wire:model="password" placeholder="minimum 8 characters"  maxlength="255" required>

            @error('password') <span class="alert-danger">{{ $message }}</span> @enderror
    </div>
    <p></p>
    <button @if(empty($this->email) || empty($this->password)) disabled @endif class="btn btn-primary" wire:click="login">Log in</button>
    </form>
</div>
