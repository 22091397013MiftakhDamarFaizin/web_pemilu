<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Caleg Registrasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .sidebar {
            width: 250px;
            background-color: red;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            color: #fff;
            padding: 20px;
        }

        .sidebar img {
            height: 100px;
            width: 160px;
            top: 20px;
            left: 20px;
            display: block;
            margin: 0 auto 20px;
        }

        .sidebar h1 {
            font-size: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .sidebar a:hover {
            background-color: #de0a26;
        }

        .sidebar form button {
            color: #fff;
            background: none;
            border: none;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
            text-align: left;
        }

        .sidebar form button:hover {
            background-color: #de0a26;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .form-container h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 35px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        thead:empty {
            display: none;
        }

        .submit-btn {
            display: inline-block;
            background-color: red;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #de0a26;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <img src="{{ asset('image/logo_kpu-copy.jpg') }}" alt="Logo KPU">
    <div class="menu">
        <a href="{{ route('beranda-parpol') }}">Upload Berkas</a>
        <a href="{{ route('daftar-caleg-registrasi') }}">Daftar Caleg Sudah Upload Berkas</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</div>

<div class="content">
    <div class="navbar">
        <h4>Daftar Caleg</h4>
        <div class="user-info">
            <span style="font-weight: bold; margin-right: 10px">{{ Auth::user()->username }}</span>
            <img src="{{ asset('image/user.svg') }}">
        </div>
    </div>

    @php
        $userCalegCount = App\Models\Candidate::where('user_id', Auth::id())->count();
    @endphp


    <div class="form-container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Posisi</th>
                    <th>Formulir</th>
                    <th>KTP</th>
                    <th>Ijazah</th>
                    <th>Surat Pernyataan</th>
                    <th>Surat Bebas Narkoba</th>
                </tr>
            </thead>
            <tbody>
                @foreach($candidates as $candidate)
                <tr>
                    <td>{{ $loop->iteration }}</td> <!-- Nomor urut otomatis -->
                    <td>{{ $candidate->name }}</td>
                    <td>{{ $candidate->position }}</td>
                    <td><a href="{{ Storage::url($candidate->formulir) }}" target="_blank" class="btn btn-danger btn-sm">View</a></td>
                    <td><a href="{{ Storage::url($candidate->ktp) }}" target="_blank" class="btn btn-danger btn-sm">View</a></td>
                    <td><a href="{{ Storage::url($candidate->ijazah) }}" target="_blank" class="btn btn-danger btn-sm">View</a></td>
                    <td><a href="{{ Storage::url($candidate->surat_pernyataan) }}" target="_blank" class="btn btn-danger btn-sm">View</a></td>
                    <td><a href="{{ Storage::url($candidate->surat_bebas_narkoba) }}" target="_blank" class="btn btn-danger btn-sm">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
