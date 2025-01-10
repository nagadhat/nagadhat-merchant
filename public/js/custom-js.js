/*
 =========================================================================
 ======================      Add Product Page     ========================
 =========================================================================
 */
function productTypeChange() { // Product Variation Hide and show
    var res = document.getElementById("productType").value;
    if (res == "single") {
        document.getElementById("productVariation").classList.add("d-none");
    } else if (res == "variation") {
        document.getElementById("productVariation").classList.remove("d-none");
    }
}

// This function will collect the html input from bubble editor and set to <textare id="bubble-editor-input">
quill.on('text-change', function(delta, oldDelta, source) { 
    document.getElementById("bubble-editor-input").value = quill.root.innerHTML;
});

var quill2 = new Quill('#snow-editor-full', {
    theme: 'snow'
});
quill2.on('text-change', function(delta, oldDelta, source) { 
    document.getElementById("snow-editor-full-input").value = quill2.root.innerHTML;
});
