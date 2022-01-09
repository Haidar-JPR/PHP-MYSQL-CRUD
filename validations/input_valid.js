function validSiswa(massage) {

    var id = document.getElementById("id").value;
    var nama = document.getElementById("nama").value;
    var alamat = document.getElementById("alamat").value;
    var kelas = document.getElementById("kelas").value;

    if (id != "" && nama != "" && alamat != "" && kelas != null) {
        alert(massage);
        return true;
    } else if (id == "") {
        alert("Silahkan inputkan id!");
        return false;
    } else if (nama == "") {
        alert("Silahkan inputkan nama!");
        return false;
    } else if (alamat == "") {
        alert("Silahkan inputkan alamat!");
        return false;
    } else if (kelas == null) {
        alert("Silahkan inputkan kelas!");
        return false;
    } else {
        alert("Silahkan isi semua inputan!");
        return false;
    }

}

function validKelas(massage) {

    var id = document.getElementById("id").value;
    var kelas = document.getElementById("kelas").value;
    var wali = document.getElementById("wali").value;

    if (id != "" && kelas != "" && wali != "") {
        alert(massage);
        return true;
    } else if (id == "") {
        alert("Silahkan inputkan id!");
        return false;
    } else if (kelas == "") {
        alert("Silahkan inputkan kelas!");
        return false;
    } else if (wali == "") {
        alert("Silahkan inputkan wali kelas!");
        return false;
    } else {
        alert("Silahkan isi semua inputan!");
        return false;
    }

}