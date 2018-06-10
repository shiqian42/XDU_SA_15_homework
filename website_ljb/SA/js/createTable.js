function createTable(ID, tool, date, status){
    var tableNode=document.getElementById("toolsTable");
    //var toolName=document.getElementById("toolname").value;
    //tableNode=document.createElement("table");//获得对象
    //tableNode.setAttribute("id","table")

    var rows=tableNode.rows.length;
    var row=tableNode.insertRow(rows);
    //var lastrow=tableNode.rows.item(rows);//会导致蜜汁错误
    if(status == "Idle")
        row.setAttribute("class", "info");
    else if(status == "In use")
        row.setAttribute("class", "warning");
    else if(status == "Borrowed")
        row.setAttribute("class", "warning");
    else if(status == "Returned")
        row.setAttribute("class", "info");
    //var cell0=lastrow.insertCell(0);
    var cell1=row.insertCell(0);
    var cell2=row.insertCell(1);
    var cell3=row.insertCell(2);
    var cell4=row.insertCell(3);
    //cell1.innerHTML=String(1);
    //cell2.innerHTML=toolName.toString();
    //cell3.innerHTML="";
    //cell4.innerHTML="Approved";
    cell1.innerHTML=ID;
    cell2.innerHTML=tool;
    cell3.innerHTML=date;
    cell4.innerHTML=status;
}

function createTable2(toolName, wareHouse, idleNumber)
{
    var tableNode2=document.getElementById("toolsTable");

    var rows=tableNode2.rows.length;
    var row=tableNode2.insertRow(rows);

    //alert(rows);
    var lastrowcell=tableNode2.rows[rows - 1].cells;
    var lastbtnInfo=lastrowcell[3].innerHTML;
    //alert(lastbtnInfo);
    //lastbtnInfo=lastbtnInfo.substr(71, 4);
    //alert(lastbtnInfo);
    for(var i = 0, j = -1; i < lastbtnInfo.length; i++)
    {
        if(IsNumeric(lastbtnInfo.charAt(i)))
        {
            if(j == -1)
                j = i;
            continue;
        }
        else if(lastbtnInfo.charAt(i) == ">")
            break;
        else if(j > 0)
        {
            lastbtnInfo=lastbtnInfo.substr(j, i);
            break;
        }
    }
    //alert(lastbtnInfo);
    var lastbtnID=parseInt(lastbtnInfo);
    //alert(lastbtnID);

    //alert(rows);

    var cell1=row.insertCell(0);
    var cell2=row.insertCell(1);
    var cell3=row.insertCell(2);
    var cell4=row.insertCell(3);
    cell1.innerHTML=toolName;
    cell2.innerHTML=wareHouse;
    cell3.innerHTML=idleNumber;
    if(idleNumber>0)
    {
        row.setAttribute("class", "info");
        cell4.innerHTML="<button class=" + '"' + "btn btn-default btn-info" + '"' + " id=" + "requestbtn" + String(lastbtnID+1) + " onclick=" + "borrowTool(" + '"' + "requestbtn" + String(lastbtnID+1) + '"' + ")" + ">预定</button>";
    }
    else
    {
        row.setAttribute("class", "warning");
        cell4.innerHTML="<button class=" + '"' + "btn btn-default" + '"' + " id=" + "requestbtn" + String(lastbtnID+1) + "+" + ">预定</button>";
    }


}

function IsNumeric(sText)
{
    var ValidChars = "0123456789.";
    var IsNumber=true;
    var Char;


    for (var i = 0; i < sText.length && IsNumber == true; i++)
    {
        Char = sText.charAt(i);
        if (ValidChars.indexOf(Char) == -1)
        {
            IsNumber = false;
        }
    }
    return IsNumber;

}

function delRow(){
    //要删除行，必须得到table对象才能删除，所以在创建的时候必须要设置table对象的 id 方便操作
    var tab=document.getElementById("table");//获得table对象
    if(tab==null){
        alert("删除的表不存在！")
        return;
    }
    var rows=parseInt(document.getElementsByName("delrow1")[0].value);//获得要删除的对象
    if(isNaN(rows)){
        alert("输入的行不正确。请输入要删除的行。。。");
        return;
    }
    if (rows >= 1 && rows <= tab.rows.length) {
        tab.deleteRow(rows-1);
    }else{
        alert("删除的行不存在！！");
        return ;
    }

}
//删除列要麻烦些， 要通过行来进行删除
// 一行的cells的长度就是列的个数
//tab.rows[x].deleteCell(cols-1)
function delCols(){
    //获得table对象
    var tab=document.getElementById("table");

    if(tab==null){
        alert("删除的表不存在！！");
        return ;
    }
    //获得文本框里面的内容
    var cols=parseInt(document.getElementsByName("delcols1")[0].value);
    //检查是否可靠
    if(isNaN(cols)){
        alert("输入不正确。请输入要输出的列。。");
        return;
    }
    if(!(cols>=1 && cols<tab.rows[0].cells.length)){
        alert("您要删除的行不存在！！");
        return;
    }
    for(var x=0;x<tab.rows.length;x++){//所有的行
        tab.rows[x].deleteCell(cols-1);
    }
}
