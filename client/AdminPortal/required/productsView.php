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
            <i class="material-icons right">add</i>
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
        <div class="row">
            <div id="msg"></div>
            <form id="modal-form">
                <div class="input-field col s12 m9">
                    <input type="text" id="title" name="title" />
                    <label for="title" >Product Title</label>
                </div>
                <div class="input-field col s12 m3">
                    <input type="text" id="price" class="validate" name="price" />
                    <label for="price">Price</label>
                </div>
                <div class="input-field col s12">
                    <textarea class="materialize-textarea" id="description" name="about"></textarea>
                    <label for="description">Product Description</label>
                </div>
                <!--<div class="file-field input-field col s12">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" name="file[]" id="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Select Photo" name="file[]" id="file">
                    </div>
                </div> -->
        </div>
    </div>
    <div class="modal-footer">
        <a class="btn btn-flat red white-text modal-action modal-close">close</a>
        <button type="submit" class="btn btn-flat blue white-text" id="nextBtn">finish
            <i class="material-icons right">done</i>
        </button>
        <div id="progress-bar"></div>
        </form>
    </div>    
</div>';
?>