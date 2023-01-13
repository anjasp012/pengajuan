window.opsi = (url, element, id) => {
    element.attr("disabled", true);
    element.select2({ placeholder: "Menunggu" });
    axios.get(url).then((res) => {
      let opt = `<option value="">Choose...</option>`;
      res.data.map((item, i) => {
        opt += `<option ${item.id == id ? "selected" : ""} value="${
          item.id
        }">${item.name}</option>`;
      });
      element.html(opt);
      element.select2({ placeholder: "Pilih" });
      element.attr("disabled", false);
    });
};

window.opsiMultiple = (url, element, id = []) => {
    axios.get(url).then((res) => {
      let opt = `<option disabled selected>Pilih...</option>`;
      res.data.map((item, i) => {
        opt += `<option ${item.id_produk == id ? "selected" : ""} value="${
            item.id_produk
          }">${item.nama_produk}</option>`;
      });
      element.removeAttr('disabled');
      element.addClass('bg-white');
      element.html(opt);
    });
};

window.opsiMultipleTipe = (url, element, id = []) => {
    axios.get(url).then((res) => {
      let opt = `<option disabled selected>Pilih...</option>`;
      res.data.map((item, i) => {
        opt += `<option ${item.id_tipe == id ? "selected" : ""} value="${
            item.id_tipe
          }">${item.nama_tipe}</option>`;
      });
      element.removeAttr('disabled');
      element.addClass('bg-white');
      element.html(opt);
    });
};



  window.tampilHarga = (url, element, id = []) => {
    axios.get(url).then((res) => {
        element.val(res.data.harga);
    });
};

//   window.tampilManager = (url, element, id = []) => {
//     axios.get(url).then((res) => {
//         console.log(res);
//         element.val(res.data.user_name);
//     });
// };

window.tampilManager = (url, element, id, old = []) => {
    axios.get(url).then((res) => {
      let opt = `<option disabled selected>Pilih...</option>`;
      res.data.map((item, i) => {
        opt += `<option ${item.id_user == id ? "selected" : ""} value="${
            item.id_user
          }">${item.user_name}</option>`;
      });
      element.removeAttr('disabled');
      element.addClass('bg-white');
      element.html(opt);
    });
};
