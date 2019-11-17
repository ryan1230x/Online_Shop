<div class="card-panel" id="outer-view" style="padding:0;">
    <div id="product-info">
        <div style="padding:0;">
            <img src="https://image1.lacoste.com/dw/image/v2/AAQM_PRD/on/demandware.static/Sites-ES-Site/Sites-master/es/dwc6b039ce/L1212_Z3T_20.jpg?imwidth=914&impolicy=product"
            id="product-pic"
            class="responsive-img" />                
        </div>
        <div style="padding: 0 20px; align-self: center;">    
            <h2>Polo Design</h2>
            <p class="right-align">$99</p>
            <p>
            El icónico polo de Lacoste L.12.12 en petit piqué de algodón combina la comodidad, la sencillez y la elegancia. Un diseño elegante y atemporal, perfecto con bermudas o pantalones de gabardina.
            </p>
            <ul>
                <li>- Classic fit</li>
                <li>- Cuello y bordes de las mangas acanalados</li>
                <li>- Bajo recto con aberturas laterales</li>
            </ul>            
            <label>Select Size</label>
            <select class="browser-default">
                <option value="" disabled selected>Choose your option</option>
                <option value="1">Extra Small (XS)</option>
                <option value="2">Small (S)</option>
                <option value="3">Medium (M)</option>
                <option value="3">Large (L)</option>
                <option value="3">Extra Large (XL)</option>
            </select>                                
            <button class="btn black hoverable" style="border-radius:40px; margin-top:20px;" onclick="Materialize.toast('Added to Cart', 4000)">Add to Cart</button>            
        </div>
    </div>
    <?php
    require_once 'recommend.php';
    ?>
</div>
<script>

const imgs = [
    "https://image1.lacoste.com/dw/image/v2/AAQM_PRD/on/demandware.static/Sites-ES-Site/Sites-master/es/dw09c95a35/L1212_Z3T_24.jpg?imwidth=914&impolicy=product",
    "https://image1.lacoste.com/dw/image/v2/AAQM_PRD/on/demandware.static/Sites-ES-Site/Sites-master/es/dwc6b039ce/L1212_Z3T_20.jpg?imwidth=914&impolicy=product"
]
document.getElementById("product-pic").addEventListener("mouseover", () => {    
    document.getElementById("product-pic").src = imgs[0];    
});
document.getElementById("product-pic").addEventListener("mouseout", () => {    
    document.getElementById("product-pic").src = imgs[1];    
});
</script>