-- ============================================================
--  Kalender Keuntungan — skema Supabase
--  Jalankan file ini di: Dashboard Supabase -> SQL Editor -> Run
-- ============================================================

-- Tabel profit: satu baris per pengguna per tanggal
create table if not exists public.profits (
    user_id    uuid not null references auth.users (id) on delete cascade,
    date       date not null,
    amount     bigint not null check (amount >= 0),
    updated_at timestamptz not null default now(),
    primary key (user_id, date)
);

-- Wajib: Row Level Security menyala
alter table public.profits enable row level security;

-- Setiap pengguna HANYA bisa menyentuh baris miliknya sendiri
drop policy if exists "profits_select_own" on public.profits;
create policy "profits_select_own" on public.profits
    for select using (auth.uid() = user_id);

drop policy if exists "profits_insert_own" on public.profits;
create policy "profits_insert_own" on public.profits
    for insert with check (auth.uid() = user_id);

drop policy if exists "profits_update_own" on public.profits;
create policy "profits_update_own" on public.profits
    for update using (auth.uid() = user_id) with check (auth.uid() = user_id);

drop policy if exists "profits_delete_own" on public.profits;
create policy "profits_delete_own" on public.profits
    for delete using (auth.uid() = user_id);

-- ============================================================
--  SETELAH menjalankan SQL ini, satu langkah lagi di dashboard:
--  Authentication -> Sign In / Providers -> aktifkan
--  "Allow anonymous sign-ins" (aplikasi login anonim per perangkat).
-- ============================================================
