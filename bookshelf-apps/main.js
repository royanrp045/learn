document.addEventListener("DOMContentLoaded", function () {
  const submitForm = document.getElementById("inputBook");

  submitForm.addEventListener("submit", function (event) {
    event.preventDefault();
    tambahBuku();
  });

  const searchForm = document.getElementById("searchBook");

  searchForm.addEventListener("submit", (event) => {
    event.preventDefault();
    cariBukuJudul();
  });

  // Change text
  const checkBox = document.getElementById("inputBookIsComplete");
  checkBox.addEventListener("change", () => {
    periksaSelesai();
  });

  if (isStorageExist()) {
    loadDataFromStorage();
  }
});

document.addEventListener("ondatasaved", () => {
  console.log("Data berhasil disimpan.");
});

document.addEventListener("ondataloaded", () => {
  perbaruiDataDariBuku();
});

const DAFTAR_BELUM_SELESAI = "incompleteBookshelfList";
const DAFTAR_SELESAI = "completeBookshelfList";
const ID_BUKU = "itemId";

// Data sementara
let books = [];

// Function
function tambahBuku() {
  const daftarBelumSelesai = document.getElementById(DAFTAR_BELUM_SELESAI);
  const daftarSelesai = document.getElementById(DAFTAR_SELESAI);

  // Ambil elemen
  const judul = document.getElementById("inputBookTitle").value;
  const pengarang = document.getElementById("inputBookAuthor").value;
  const tahun = parseInt(document.getElementById("inputBookYear").value, 10);
  const sudahSelesai = document.getElementById("inputBookIsComplete").checked;

  const buku = buatBuku(judul, pengarang, tahun, sudahSelesai);
  const objekBuku = susunObjekBuku(judul, pengarang, tahun, sudahSelesai);

  // Dapatkan ID
  buku[ID_BUKU] = objekBuku.id;

  books.push(objekBuku);

  if (sudahSelesai) {
    daftarSelesai.append(buku);
  } else {
    daftarBelumSelesai.append(buku);
  }
  perbaruiDataKePenyimpanan();
}

function buatBuku(title, author, year, isComplete) {
  const teksJudul = document.createElement("h3");
  teksJudul.innerText = title;

  const teksPengarang = document.createElement("p");
  teksPengarang.innerText = author;

  const teksTahun = document.createElement("p");
  teksTahun.innerText = year.toString();

  // Aksi
  const aksi = document.createElement("div");
  aksi.classList.add("action");

  if (isComplete) {
    aksi.append(buatTombolBelumSelesai(), buatTombolHapus());
  } else {
    aksi.append(buatTombolSelesai(), buatTombolHapus());
  }

  const container = document.createElement("article");
  container.classList.add("book_item");

  container.append(teksJudul, teksPengarang, teksTahun, aksi);

  return container;
}

function buatTombol(tipeTombol, eventListener) {
  const tombol = document.createElement("button");
  tombol.classList.add(tipeTombol);
  tombol.addEventListener("click", function (event) {
    eventListener(event);
  });

  return tombol;
}

function buatTombolSelesai() {
  const tombolSelesai = buatTombol("green", function (event) {
    tambahBukuKeSelesai(event.target.parentElement.parentElement);
  });

  tombolSelesai.innerText = "Selesai dibaca";
  return tombolSelesai;
}

function buatTombolHapus() {
  const tombolHapus = buatTombol("red", function (event) {
    hapusBuku(event.target.parentElement.parentElement);
  });

  tombolHapus.innerText = "Hapus buku";
  return tombolHapus;
}

function buatTombolBelumSelesai() {
  const tombolBelumSelesai = buatTombol("green", function (event) {
    tambahBukuKeBelumSelesai(event.target.parentElement.parentElement);
  });

  tombolBelumSelesai.innerText = "Belum Selesai di Baca";
  return tombolBelumSelesai;
}

function tambahBukuKeSelesai(elemenBuku) {
  const daftarSelesai = document.getElementById(DAFTAR_SELESAI);

  const titleBuku = elemenBuku.querySelector(".book_item > h3").innerText;
  const authorBuku = elemenBuku.querySelector(".book_item > p").innerText;
  const yearBuku = elemenBuku.querySelector(".book_item > p ~ p").innerText;

  const bukuBaru = buatBuku(titleBuku, authorBuku, yearBuku, true);
  const buku = cariBuku(elemenBuku[ID_BUKU]);

  buku.isComplete = true;
  bukuBaru[ID_BUKU] = buku.id;

  daftarSelesai.append(bukuBaru);

  elemenBuku.remove();
  perbaruiDataKePenyimpanan();
}

function tambahBukuKeBelumSelesai(elemenBuku) {
  const daftarBelumSelesai = document.getElementById(DAFTAR_BELUM_SELESAI);

  const titleBuku = elemenBuku.querySelector(".book_item > h3").innerText;
  const authorBuku = elemenBuku.querySelector(".book_item > p").innerText;
  const yearBuku = elemenBuku.querySelector(".book_item > p ~ p").innerText;

  const bukuBaru = buatBuku(titleBuku, authorBuku, yearBuku, false);
  const buku = cariBuku(elemenBuku[ID_BUKU]);

  buku.isComplete = false;
  bukuBaru[ID_BUKU] = buku.id;

  daftarBelumSelesai.append(bukuBaru);

  elemenBuku.remove();
  perbaruiDataKePenyimpanan();
}

function hapusBuku(elemenBuku) {
  const posisiBuku = cariIndeksBuku(elemenBuku[ID_BUKU]);
  books.splice(posisiBuku, 1);

  elemenBuku.remove();
  perbaruiDataKePenyimpanan();
}

function periksaSelesai() {
  const checkBox = document.getElementById("inputBookIsComplete").checked;

  const teksButton = document.querySelector("span");

  if (checkBox) {
    teksButton.innerText = "selesai dibaca";
  } else {
    teksButton.innerText = "Belum selesai dibaca";
  }
}

function cariBukuJudul() {
  const kunciInput = document
    .getElementById("searchBookTitle")
    .value.toLowerCase();
  const item = document.querySelectorAll("article");

  for (i of item) {
    const judul = i.firstElementChild.textContent.toLowerCase();
    if (kunciInput === judul) {
      i.style.display = "block";
    } else if (kunciInput === "") {
      i.style.display = "";
    } else {
      i.style.display = "none";
    }
  }
}

// Kunci Local Storage
const KUNCI_PENYIMPANAN = "APLIKASI_RAKBUKU";

function isStorageExist() {
  if (typeof Storage === undefined) {
    alert("Browser kamu tidak mendukung local storage");
    return false;
  }
  return true;
}

function saveData() {
  const terkait = JSON.stringify(books);

  localStorage.setItem(KUNCI_PENYIMPANAN, terkait);
  document.dispatchEvent(new Event("ondatasaved"));
}

function loadDataFromStorage() {
  const serialData = localStorage.getItem(KUNCI_PENYIMPANAN);

  let data = JSON.parse(serialData);

  if (data !== null) {
    books = data;

    document.dispatchEvent(new Event("ondataloaded"));
  }
}

function perbaruiDataKePenyimpanan() {
  if (isStorageExist()) {
    saveData();
  }
}

function susunObjekBuku(title, author, year, isComplete) {
  return {
    id: +new Date(),
    title,
    author,
    year,
    isComplete,
  };
}

function cariBuku(bukuId) {
  for (buku of books) {
    if (buku.id === bukuId) return buku;
  }
  return null;
}

function cariIndeksBuku(bukuId) {
  let indeks = 0;
  for (buku of books) {
    if (buku.id === bukuId) return indeks;

    indeks++;
  }

  return -1;
}

function perbaruiDataDariBuku() {
  const daftarBelumSelesai = document.getElementById(DAFTAR_BELUM_SELESAI);
  let daftarSelesai = document.getElementById(DAFTAR_SELESAI);

  for (buku of books) {
    const bukuBaru = buatBuku(
      buku.title,
      buku.author,
      buku.year,
      buku.isComplete
    );
    bukuBaru[ID_BUKU] = buku.id;

    if (buku.isComplete) {
      daftarSelesai.append(bukuBaru);
    } else {
      daftarBelumSelesai.append(bukuBaru);
    }
  }
}
