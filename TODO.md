# TODO List for Completing Laravel Travel Website to 100%

## 1. Models
- [x] User model (existing, add role if needed)
- [x] Wisata model (existing)
- [ ] Pemesanan model (create)

## 2. Migrations
- [x] create_users_table (existing)
- [x] create_wisata_table (existing)
- [ ] add_role_to_users_table (create)
- [ ] create_pemesanan_table (create)

## 3. Controllers
- [x] WisataController (existing, update for auth)
- [ ] AuthController (create)
- [ ] PemesananController (create)
- [ ] AdminController (create)

## 4. Routes
- [ ] Update routes/web.php for all features

## 5. Views
- [ ] auth/login.blade.php
- [ ] auth/register.blade.php
- [ ] pemesanan/create.blade.php
- [ ] pemesanan/history.blade.php
- [ ] admin/dashboard.blade.php
- [ ] Update wisata/index.blade.php for search and auth
- [ ] Update wisata/show.blade.php for booking
- [ ] Update layouts/app.blade.php for auth nav

## 6. Seeders
- [ ] Update DatabaseSeeder for admin user

## 7. Testing
- [ ] Test all features locally
