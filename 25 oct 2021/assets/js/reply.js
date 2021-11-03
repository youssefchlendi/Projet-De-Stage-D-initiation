function doit(id){
    let x=document.getElementById('reply').style;
    let tab=document.getElementById('table').style;
    if(x.display=='none')
{
    x.display='block';
    tab.display='none';
}
    else{
        x.display='none';
        tab.display='table';
    }

    let id1=document.getElementById('clue');
    id1.value=id;
}