<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('partials.favicon')
    <title>Login Admin - MITQ Al-Hikam</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script>tailwind.config={theme:{extend:{fontFamily:{sans:['Inter']},colors:{primary:'#004d34',gold:'#735c00'}}}}</script>
</head>
<body class="min-h-screen bg-[radial-gradient(circle_at_top_left,#d8f5e7,transparent_35%),linear-gradient(135deg,#f9f9ff,#f7f1e5)] font-sans">
    <main class="flex min-h-screen items-center justify-center px-6 py-12">
        <form method="POST" action="{{ route('admin.login.store') }}" class="w-full max-w-md rounded-3xl border border-white/70 bg-white/85 p-8 shadow-2xl backdrop-blur">
            @csrf
            <div class="mb-8 text-center">
                <img src="{{ asset('images/logo.jpg') }}" alt="MITQ Al-Hikam" class="mx-auto h-20 w-20 rounded-full object-cover shadow">
                <p class="mt-5 text-xs font-bold uppercase tracking-[0.2em] text-gold">Admin CMS</p>
                <h1 class="mt-2 text-3xl font-extrabold text-primary">MITQ Al-Hikam</h1>
            </div>
            @if ($errors->any())
                <div class="mb-5 rounded-2xl bg-red-50 p-4 text-sm text-red-700">{{ $errors->first() }}</div>
            @endif
            <label class="block text-sm font-bold text-slate-700">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus class="mt-2 w-full rounded-xl border-slate-200 focus:border-primary focus:ring-primary">
            <label class="mt-5 block text-sm font-bold text-slate-700">Password</label>
            <input type="password" name="password" required class="mt-2 w-full rounded-xl border-slate-200 focus:border-primary focus:ring-primary">
            <label class="mt-5 flex items-center gap-2 text-sm text-slate-600"><input type="checkbox" name="remember" class="rounded border-slate-300 text-primary focus:ring-primary"> Ingat saya</label>
            <button class="mt-6 w-full rounded-xl bg-primary px-5 py-3 font-bold text-white shadow-lg shadow-emerald-900/20 transition hover:bg-emerald-800">Masuk Dashboard</button>
        </form>
    </main>
</body>
</html>
