<div class="content">
    <h1>Register an account</h1>
    <form wire:submit.prevent="register">
    <div class="form-group">
        <label>Name</label>
        <input class="form-control col-4 d-flex justify-content-center" type="text" wire:model.lazy="name" placeholder="John Doe" maxlength="255" required>
        @error('name') <span class="alert alert-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label>Username</label>
        <input class="form-control col-4 d-flex justify-content-center" type="text" wire:model.lazy="username" placeholder="user123" maxlength="255" required>
        @error('username') <span class="alert alert-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label>E-mail</label>
        <input class="form-control" type="email" wire:model.lazy="email" placeholder="example@example.com" minlength="8" maxlength="255" required>
        @error('email') <span class="alert alert-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label>Password</label>
        <input class="form-control" type="password" wire:model.lazy="password" placeholder="minimum 8 characters" minlength="8" maxlength="255" required>
        @error('password') <span class="alert alert-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label>Confirm Password</label>
        <input class="form-control" type="password" wire:model.lazy="password_confirmation" placeholder="Must match password" minlength="8" maxlength="255" required>
        @error('password_confirmation') <span class="alert alert-danger">{{ $message }}</span> @enderror
    </div>
    <p></p>
    <button class="btn btn-primary" name="submit">Register</button>
    </form>
</div>
