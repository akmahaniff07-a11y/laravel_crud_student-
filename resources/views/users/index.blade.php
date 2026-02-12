<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kicau Kriuk Cau Cihuy</title>

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:Poppins,sans-serif}
body{background:linear-gradient(135deg,#141e30,#243b55);color:#fff}

/* NAV */
nav{position:sticky;top:0;display:flex;justify-content:space-between;align-items:center;
padding:18px 50px;background:rgba(0,0,0,.45);backdrop-filter:blur(12px);z-index:9}
nav a{color:#fff;text-decoration:none;margin-left:20px}

/* HERO */
.hero{text-align:center;padding:110px 20px}
.hero h2{font-size:48px}
.hero p{opacity:.9;margin-top:8px}

/* GALLERY */
.gallery{padding:60px}
.gallery h2{text-align:center;margin-bottom:25px}
.gallery-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:18px}
.gallery img{width:100%;border-radius:18px;transition:.4s}
.gallery img:hover{transform:scale(1.08)}

/* SHOP */
.shop{padding:70px}
.shop-wrap{max-width:980px;margin:auto;display:grid;grid-template-columns:1.1fr .9fr;gap:30px}
.card{background:rgba(255,255,255,.12);border-radius:22px;padding:28px;backdrop-filter:blur(10px)}
select,input{width:100%;padding:12px;border:none;border-radius:10px;margin-top:12px;outline:none}
button{margin-top:16px;padding:14px;border:none;border-radius:30px;background:#ffd369;
font-weight:700;cursor:pointer;transition:.3s}
button:hover{transform:scale(1.05)}
.list{margin-top:12px}
.item{display:flex;justify-content:space-between;align-items:center;
background:rgba(0,0,0,.25);padding:10px 14px;border-radius:12px;margin-top:8px}
.item small{opacity:.8}
.total{margin-top:14px;font-size:18px;font-weight:700}
.del{cursor:pointer;color:#ff8a8a}

/* FOOTER */
footer{text-align:center;padding:24px;background:rgba(0,0,0,.45);font-size:14px}
@media(max-width:900px){.shop-wrap{grid-template-columns:1fr}}
</style>
</head>
<body>

<nav>
  <h1>🐦 KicauCihuy</h1>
  <div>
    <a href="#gallery">Gallery</a>
    <a href="#shop">Pesan</a>
  </div>
</nav>

<section class="hero">
  <h2>Kicau Kriuk Cau Cihuy 🔥</h2>
  <p>Camilan kriuk, rasa nagih, siap gaskeun</p>
</section>

<section class="gallery" id="gallery">
  <h2>📸 Gallery Produk</h2>
  <div class="gallery-grid">
    <img src="https://picsum.photos/400?1">
    <img src="https://picsum.photos/400?2">
    <img src="https://picsum.photos/400?3">
  </div>
</section>

<section class="shop" id="shop">
  <div class="shop-wrap">
    <!-- PILIH PRODUK -->
    <div class="card">
      <h3>🛒 Tambah ke Keranjang</h3>
      <input id="nama" placeholder="Nama kamu">

      <select id="rasa">
        <option value="">Pilih Rasa</option>
        <option value="Si Cau Coklat Maedup" data-harga="12000">🍫 Si Cau Coklat Maedup — 12.000</option>
        <option value="Si Cau Taro Gasken" data-harga="13000">🟣 Si Cau Taro Gasken — 13.000</option>
        <option value="Si Cau Matcha Anget" data-harga="14000">🍵 Si Cau Matcha Anget — 14.000</option>
      </select>

      <input id="qty" type="number" placeholder="Jumlah (pcs)" min="1">
      <button onclick="tambah()">Tambah</button>
    </div>

    <!-- KERANJANG -->
    <div class="card">
      <h3>🧾 Keranjang</h3>
      <div id="list" class="list"></div>
      <div class="total">Total: Rp <span id="total">0</span></div>
      <button onclick="checkout()">Checkout via WhatsApp</button>
    </div>
  </div>
</section>

<footer>© 2026 Kicau Kriuk Cau Cihuy • NEXT LEVEL 💰</footer>

<script>
let cart=[], total=0;

function rupiah(n){return n.toLocaleString('id-ID');}

function tambah(){
  const rasaSel=document.getElementById('rasa');
  const rasa=rasaSel.value;
  const harga=Number(rasaSel.selectedOptions[0]?.dataset.harga||0);
  const qty=Number(document.getElementById('qty').value);
  if(!rasa||!qty){alert('Lengkapi dulu 🔥');return;}
  cart.push({rasa,harga,qty});
  render();
}

function hapus(i){cart.splice(i,1);render();}

function render(){
  const list=document.getElementById('list');
  list.innerHTML=''; total=0;
  cart.forEach((c,i)=>{
    const sub=c.harga*c.qty; total+=sub;
    list.innerHTML+=`
      <div class="item">
        <div>
          <b>${c.rasa}</b><br>
          <small>${c.qty} x Rp ${rupiah(c.harga)}</small>
        </div>
        <div>
          Rp ${rupiah(sub)} <span class="del" onclick="hapus(${i})">✖</span>
        </div>
      </div>`;
  });
  document.getElementById('total').innerText=rupiah(total);
}

function checkout(){
  const nama=document.getElementById('nama').value;
  if(!nama||!cart.length){alert('Nama / keranjang kosong');return;}
  let pesan=`Halo Admin Kicau Cihuy 👋\nNama: ${nama}\n\nPesanan:\n`;
  cart.forEach(c=>pesan+=`- ${c.rasa} (${c.qty} pcs)\n`);
  pesan+=`\nTotal: Rp ${rupiah(total)}\n\nSiap order 🔥`;
  window.open(`https://wa.me/6285721191019?text=${encodeURIComponent(pesan)}`,'_blank');
}
</script>

</body>
</html>
