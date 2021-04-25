var options = [
    // {'key' : 'val' }
];
var index = 0;

function test(){
    var divOptionKey = document.getElementById("divOptionKey");
    var divOptionVal = document.getElementById("divOptionVal");

    keys = document.getElementsByName("optionKey[]");
    vals = document.getElementsByName("optionVal[]");
    k = keys[index];
    v = vals[index];

    if(k.value in options){
        alert("Vec postoji!");
        return;
    }

    for(opt of k.options){
        if(opt.value == k.value){
            opt.selected = true;
        }
        else {
            opt.selected= false;
            opt.disabled = true;
        }
    }

    k.selected = true;
    k.disabled = true;
    v.disabled = true;
    v.style.display = "none";
    //v.type="hidden";
    // v.readonly=true;
    // v.disabled = true;
    var el = {'key' : k.value, 'val' : v.value};
    options.push(el);
    //options[k.value] = v.value;
    

    divOptionKey.innerHTML += "<label>Option: </label>"
    divOptionKey.innerHTML += `<select name="optionKey[]">
    <option value="Prerequisite Id">Prerequisite Id</option>
    <option value="Kills">Kills</option>
    <option value="Gold">Gold</option>
    <option value="Gold per minute">Gold per minute</option>
    <option value="Cs">Cs</option>
    <option value="Cs per minute">Cs per minute</option>
    <option value="First turret">First turret</option>
    <option value="First blood">First blood</option>
    <option value="Multikill">Multikill</option>
</select>`;
    divOptionVal.innerHTML += '<label style="color: red" > ' + v.value + '</label><br>';
    divOptionVal.innerHTML += '<label>Value:</label><input type="text" size = 5 name="optionVal[]">';


    for(var i=0; i< options.length; i++){
        // alert(options[i]['key']);
        // alert(options[i]['val']);
   }

    
    //alert(options);

    optString = JSON.stringify(options);
    hiddenOptions = document.getElementById("hiddenOptions");
    //alert("Sad ovi jsoni");
        
    hiddenOptions.value = optString;
    index++;
}


function initEvent(){
    alert("buci");
}