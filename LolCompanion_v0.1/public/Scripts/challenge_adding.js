/*
 * Autor:
 * Veljko Rvovic 18/0132
 * 
 */
var options = [
    // {'key' : 'val' }
];
var index = 0;

var champsStr = "Aatrox,Ahri,Akali,Alistar,Amumu,Anivia,Annie,Aphelios,Ashe,Aurelion Sol,Azir,Bard,Blitzcrank,Brand,Braum,Caitlyn,Camille,Cassiopeia,Cho'Gath,Corki,Darius,Diana,Dr. Mundo,Draven,Ekko,Elise,Evelynn,Ezreal,Fiddlesticks,Fiora,Fizz,Galio,Gangplank,Garen,Gnar,Gragas,Graves,Hecarim,Heimerdinger,Illaoi,Irelia,Ivern,Janna,Jarvan IV,Jax,Jayce,Jhin,Jinx,Kai'Sa,Kalista,Karma,Karthus,Kassadin,Katarina,Kayle,Kayn,Kennen,Kha'Zix,Kindred,Kled,Kog'Maw,LeBlanc,Lee Sin,Leona,Lillia,Lissandra,Lucian,Lulu,Lux,Malphite,Malzahar,Maokai,Master Yi,Miss Fortune,Mordekaiser,Morgana,Nami,Nasus,Nautilus,Neeko,Nidalee,Nocturne,Nunu and Willump,Olaf,Orianna,Ornn,Pantheon,Poppy,Pyke,Qiyana,Quinn,Rakan,Rammus,Rek'Sai,Rell,Renekton,Rengar,Riven,Rumble,Ryze,Samira,Sejuani,Senna,Seraphine,Sett,Shaco,Shen,Shyvana,Singed,Sion,Sivir,Skarner,Sona,Soraka,Swain,Sylas,Syndra,Tahm Kench,Taliyah,Talon,Taric,Teemo,Thresh,Tristana,Trundle,Tryndamere,Twisted Fate,Twitch,Udyr,Urgot,Varus,Vayne,Veigar,Vel'Koz,Vi,Viktor,Vladimir,Volibear,Warwick,Wukong,Xayah,Xerath,Xin Zhao,Yasuo,Yone,Yorick,Yuumi,Zac,Zed,Ziggs,Zilean,Zoe,Zyra";
var champsList = champsStr.split(",");

/**
 * Funkcija za dodavanje vise mogucih opcija za izazov 
 * i dinamicki prikaz na stranici
 */
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
    var el = {'key' : k.value, 'val' : v.value};
    options.push(el);
    

    divOptionKey.innerHTML += "<label>Option: </label>"
    divOptionKey.innerHTML += `<select name="optionKey[]">
                            <option value="Prerequisite Id">Prerequisite Id</option>
                            <option value="Kills">Kills</option>
                            <option value="Gold per minute">Gold per minute</option>
                            <option value="Cs per minute">Cs per minute</option>
                            <option value="Dmg per minute">Dmg per minute</option>
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

var query = "";

/**
 * Funkcija za lepsi prikaz mogucih heroja pri pretrazi
 */
function searchChamp(){
    query = document.getElementById("champion").value;
    
    if(query.length >= 1){
        let datalist = champsList.filter(prefixFilter)
        document.getElementById("champions").innerHTML = "";
        for(let i=0; i<datalist.length; i++){
            document.getElementById("champions").innerHTML += '<option value="'+ datalist[i] +'">';
            
        }
    }
}

/**
 * Pomocna funkcija za filtriranje reci koje pocinje sa recju query
 */
function prefixFilter(word){
    return word.startsWith(query);
}