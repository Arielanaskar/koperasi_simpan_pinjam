const nominal = document.getElementById('nominal')
const submit = document.getElementById('btn-submit')
const pesan = document.getElementById('pesan')
const simulasi_pinjaman = document.getElementById('simulasi-pinjaman');
const lama_angsuran = document.getElementById('lama-angsuran'); 
const arr = [];
const pembayaran = document.querySelector(".pembayaran");
const bayar = document.getElementById("bayar");
const kembali = document.getElementById("kembali");

bayar.addEventListener('click', function(){
    pembayaran.style.display = 'inline-block';
})

kembali.addEventListener('click', function(){
    pembayaran.style.display = 'none';
    // alert(this)
})
// const header = `<tr>
//                     <th>Ags ke</th>
//                     <th>Biaya Bunga</th>
//                     <th>Biaya Admin</th>
//                     <th>Jumlah Tagihan</th>
//                 </tr>`;
// let asu;

// lama_angsuran.addEventListener('click', function(){
//     if (this.value === '3') {
//         for (let i = 0; i == 3; i++) {
//             asu+=`<tr>
//                     <td>${i}</td>
//                     <td>30%</td>
//                     <td>1.500</td>
//                     <td>1.500</td>
//                 </tr>`;
//         }
//         // simulasi_pinjaman.innerHTML = `
//         //                                <tr>
//         //                                    <th>Ags ke</th>
//         //                                    <th>Biaya Bunga</th>
//         //                                    <th>Biaya Admin</th>
//         //                                    <th>Jumlah Tagihan</th>
//         //                                </tr>
//         //                                <tr>
//         //                                    <td>${3}</td>
//         //                                    <td>30%</td>
//         //                                    <td>1.500</td>
//         //                                    <td>1.500</td>
//         //                                </tr>`;
//     }else if(this.value === '4'){
//         simulasi_pinjaman.innerHTML = `
//                                        <tr>
//                                            <th>Ags ke</th>
//                                            <th>Biaya Bunga</th>
//                                            <th>Biaya Admin</th>
//                                            <th>Jumlah Tagihan</th>
//                                        </tr>
//                                        <tr>
//                                            <td>${4}</td>
//                                            <td>30%</td>
//                                            <td>1.500</td>
//                                            <td>1.500</td>
//                                        </tr>`;
//     }else if(this.value === '5'){
//         simulasi_pinjaman.innerHTML = `
//                                        <tr>
//                                            <th>Ags ke</th>
//                                            <th>Biaya Bunga</th>
//                                            <th>Biaya Admin</th>
//                                            <th>Jumlah Tagihan</th>
//                                        </tr>
//                                        <tr>
//                                            <td>${5}</td>
//                                            <td>30%</td>
//                                            <td>1.500</td>
//                                            <td>1.500</td>
//                                        </tr>`;
//     }else {
        
//     }
// })

submit.addEventListener('click',function(e){
    if (nominal.value >= 5000000) {
        pesan.style.display ='block'
        e.preventDefault()
        return false;
    }
})

// console.log(arr);
 // console.log(asu)
