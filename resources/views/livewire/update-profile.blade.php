<div class="container">
    <h1>Update {{ $user->username }}</h1>
    <h4>Name: {{ $user->name }}</h4>
    <h4>Username: {{ $user->username }}</h4>
    <h4>E-mail: {{ $user->email }}</h4>
    <hr>
    <div class="row">
            <label>Name</label>
        <div class="col">
            <input class="form-control col-4 d-flex justify-content-center" type="text" wire:model.lazy="name" placeholder="John Doe" maxlength="255" required>
            @error('name') <span class="alert alert-danger">{{ $message }}</span> @enderror
        </div>
        <div class="col">
            <button class="btn btn-primary" wire:click="updateName">Update Name</button>
        </div>
    </div>
    <div class="row">
        <label>Username</label>
        <div class="col">
            <input class="form-control col-4 d-flex justify-content-center" type="text" wire:model.lazy="username" placeholder="user123" maxlength="255" required>
            @error('username') <span class="alert alert-danger">{{ $message }}</span> @enderror
        </div>
        <div class="col">
            <button class="btn btn-primary" wire:click="updateUsername">Update username</button>
        </div>
    </div>

    <div class="row">
        <label>Email</label>
        <div class="col">
            <input class="form-control col-4 d-flex justify-content-center" type="text" wire:model.lazy="email" placeholder="example@example.com" maxlength="255" required>
            @error('email') <span class="alert alert-danger">{{ $message }}</span> @enderror
        </div>
        <div class="col">
            <button class="btn btn-primary" wire:click="updateEmail">Update E-mail Address</button>
        </div>
    </div>
    <div class="row">
        <label>Password</label>
        <div class="col">
            <input class="form-control col-4 d-flex justify-content-center" type="text" wire:model.lazy="password" placeholder="Password: Minimum 8 characters" maxlength="255" required>
            @error('password') <span class="alert-danger">{{ $message }}</span> @enderror
        </div>
        <div class="col">
        </div>
    </div>
    <div class="row">
        <label>Confirm Password</label>
        <div class="col">
            <input class="form-control col-4 d-flex justify-content-center" type="text" wire:model.lazy="password_confirmation" placeholder="Must match Password" maxlength="255" required>
            @error('password_confirmation') <span class="alert-danger">{{ $message }}</span> @enderror
        </div>
        <div class="col">
            <button class="btn btn-primary" wire:click="updatePassword">Update Password</button>
        </div>
    </div>
</div>
