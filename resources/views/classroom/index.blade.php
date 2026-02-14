@extends('layouts.app')
<style>
  :root{
    --bg: #f5f7fb;
    --card: #ffffff;
    --border: #e6eaf0;
    --text: #0f172a;
    --muted: #64748b;
    --primary: #2563eb;
    --info: #0ea5e9;
    --warning: #f59e0b;
    --danger: #ef4444;
    --soft: #f1f5f9;
    --radius: 14px;
    --shadow: 0 10px 24px rgba(15,23,42,.06);
  }

  body{ background: var(--bg); }

  .page {
    max-width: 1100px;
    margin: 28px auto;
    padding: 0 16px;
  }

  .card {
    background: var(--card);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    padding: 18px 18px 8px;
    border: 1px solid var(--border);
  }

  .header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 12px;
  }

  .title {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .title h1{
    font-size: 22px;
    margin: 0;
    color: var(--text);
    letter-spacing: .2px;
  }

  .btn {
    appearance: none;
    border: 0;
    padding: 10px 14px;
    border-radius: 10px;
    color: #fff;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: transform .12s ease, box-shadow .12s ease, filter .12s ease;
    box-shadow: 0 6px 14px rgba(0,0,0,.08);
    display: inline-flex;
    align-items: center;
    gap: 6px;
  }
  .btn:active{ transform: translateY(1px) scale(.99); }
  .btn-primary{ background: linear-gradient(135deg, #2563eb, #1d4ed8); }
  .btn-info{ background: linear-gradient(135deg, #0ea5e9, #0284c7); }
  .btn-warning{ background: linear-gradient(135deg, #f59e0b, #d97706); }
  .btn-danger{ background: linear-gradient(135deg, #ef4444, #dc2626); }
  .btn:hover{ filter: brightness(1.05); }

  .alert-success{
    background: #ecfeff;
    color: #155e75;
    border: 1px solid #bae6fd;
    border-radius: 10px;
    padding: 10px 12px;
    margin: 10px 0 12px;
  }

  .table-wrap{
    overflow-x: auto;
    border-radius: 12px;
    border: 1px solid var(--border);
  }

  table{
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    background: #fff;
  }

  thead th{
    background: var(--soft);
    color: #334155;
    font-weight: 700;
    font-size: 13px;
    letter-spacing: .4px;
    text-transform: uppercase;
    padding: 12px 10px;
    border-bottom: 1px solid var(--border);
  }

  tbody td{
    padding: 12px 10px;
    border-bottom: 1px solid var(--border);
    color: #0f172a;
  }

  tbody tr{
    transition: background .12s ease, transform .06s ease;
  }
  tbody tr:hover{
    background: #fafcff;
  }

  td.center, th.center{ text-align: center; }

  .badge{
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 10px;
    border-radius: 999px;
    background: #e0f2fe;
    color: #075985;
    font-weight: 700;
    font-size: 12px;
  }

  .actions{
    display: flex;
    gap: 8px;
    justify-content: center;
    flex-wrap: wrap;
  }

  .pagination-wrap{
    padding: 10px 6px 14px;
  }

  /* empty state (kalau data kosong) */
  .empty{
    text-align: center;
    padding: 28px 12px;
    color: var(--muted);
  }
</style>

<div class="page">
  <div class="card">
    <div class="header">
      <div class="title">
        <span>📚</span>
        <h1>Daftar Classroom</h1>
      </div>
      <a href="{{ route('classroom.create') }}" class="btn btn-primary">
        ➕ Tambah Classroom
      </a>
    </div>

    @if(session('success'))
      <div class="alert-success">✅ {{ session('success') }}</div>
    @endif

    <div class="table-wrap">
      <table>
        <thead>
          <tr>
            <th class="center">ID</th>
            <th>Nama</th>
            <th class="center">Level</th>
            <th class="center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($classrooms as $classroom)
            <tr>
              <td class="center"><strong>{{ $classroom->id }}</strong></td>
              <td>{{ $classroom->name }}</td>
              <td class="center">
                <span class="badge">Level {{ $classroom->level }}</span>
              </td>
              <td class="center">
                <div class="actions">
                  <a href="{{ route('classroom.show', $classroom->id) }}" class="btn btn-info">👁 Lihat</a>
                  <a href="{{ route('classroom.edit', $classroom->id) }}" class="btn btn-warning">✏️ Edit</a>
                  <form action="{{ route('classroom.destroy', $classroom->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                      onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                      🗑 Hapus
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="empty">Belum ada data classroom.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="pagination-wrap">
      {{ $classrooms->links() }}
    </div>
  </div>
</div>
