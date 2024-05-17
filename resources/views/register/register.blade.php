<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">

</head>
<style>
    .login{
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        margin-top: 150px;
    }
    .login form{
        height: 200px;
        width: 400px;
        padding: 20px;
    }
    .button{
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        margin-top: 20px;
    }
    .button a{
        color: white !important;
    }
</style>
</head>
<body class="wrapper">
<div class="login">
    <form action="{{ route('register.submit') }}" method="POST" class="form form-control">
        @csrf
        @method('POST')
        <div class="box justify-content-evenly">
            <label class="form weight-bold col-4">Name</label>
            <input class="border border-secondary rounded-1 col-6" name="name" placeholder="Someone" required>
        </div>
        <div class="box justify-content-evenly">
            <label class="form weight-bold col-4">Password</label>
            <input class="border border-secondary rounded-1 col-6" name="password" placeholder="Password" required>
        </div>
        <div class="box justify-content-evenly">
            <label class="form weight-bold col-4">Role</label>
            <select type="radio" class="border border-secondary rounded-1 col-6" name="role" placeholder="Role" required>
                <option value="admin">Admin</option>
                <option value="impostor">Impostor</option>
            </select>
        </div>
        <div class="button">
            <button type="submit" class="btn btn-primary">Register</button>
            <a href="/" type="button" class="btn btn-secondary">Login</a>
        </div>
    </form>
</div>
</body>
</html>