<?php

echo' 
<div id="purchasedSection" class="card-panel z-depth-2">
<div class="row">
    <div class="col s12 m4 l4 input-field">        
        <input type="text" id="search" validate />
        <label for="search"><i class="material-icons">search</i> Search</label>        
    </div>
    <div class="d-flex col s12">
        <a class="btn secondary-btn hoverable ml-auto modal-trigger" href="#modal">Add Product
            <i class="material-icons left">add</i>
        </a>
    </div>
</div>
<table class="centered">
        <thead>
        <tr>
            <th>N#</th>
            <th>ITEM NAME</th>          
            <th>ACTION</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Jacket</td>        
            <td>
                <button class="btn secondary-btn hoverable">
                    <i class="material-icons">edit</i>
                </button>
                <button class="btn red hoverable">
                    <i class="material-icons">delete</i>
                </button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Shoes</td>        
            <td>
                <button class="btn secondary-btn hoverable">
                    <i class="material-icons">edit</i>
                </button>
                <button class="btn red hoverable">
                    <i class="material-icons">delete</i>
                </button>
            </td>            
            
            
        </tr>
        <tr>
            <td>3</td>
            <td>Lolipop</td>        
            <td>
                <button class="btn secondary-btn hoverable">
                    <i class="material-icons">edit</i>
                </button>
                <button class="btn red hoverable">
                    <i class="material-icons">delete</i>
                </button>                
            </td>
        </tr>
        </tbody>
    </table>  
</div>

<div id="modal" class="modal">
    <div class="modal-content">
        <h5>Please fill in all the fields</h5>
        <div class="row">
            <form>
                <div class="input-field col s12 m9">
                    <input type="text" id="title" />
                    <label for="title">Product Title</label>
                </div>
                <div class="input-field col s12 m3">
                    <input type="text" id="price" />
                    <label for="price">Price</label>
                </div>
                <div class="input-field col s12">
                <textarea class="materialize-textarea" id="description"></textarea>
                <label for="description">Product Description</label>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a class="btn btn-flat modal-action modal-close">Agree</a>
    </div>
</div>';
?>