# TODO: Fix Penginapan Creation Timestamp Issue

## Steps to Complete
- [ ] Create a new migration to rename 'harga' column to 'harga_per_malam' in penginapans table
- [ ] Edit the migration file to implement the column rename
- [ ] Update PenginapanController.php update method validation to use 'harga_per_malam' instead of 'harga'
- [ ] Run the new migration
- [ ] Test creating a new penginapan to ensure data and timestamps are saved correctly
