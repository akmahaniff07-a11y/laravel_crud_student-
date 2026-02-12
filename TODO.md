# TODO: Complete CRUD for Buku (Books) Table

- [x] Fix app/Models/Buku.php: Change table name to 'bukus', add 'category' to fillable
- [x] Update app/Http/Controllers/BukuController.php: Fix index variable, add validation to store, implement show, edit, update, destroy methods
- [x] Update resources/views/Buku.blade.php: Change to list books with CRUD links
- [x] Update resources/views/Buku/Create.blade.php: Form for name and category
- [x] Create resources/views/Buku/Edit.blade.php: Edit form
- [x] Create resources/views/Buku/Show.blade.php: Show single book details
- [x] Check and update routes/web.php: Ensure resource route for buku
