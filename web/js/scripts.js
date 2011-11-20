/*function anchorToAjaxHelper()
{
    $$('a').each(function(obj){
        console.log(obj);
        var url = obj.readAttribute('url');
        obj.writeAttribute('url', '');
        obj.observe('click', function(){new Ajax.Updater($('content'), url, {method: 'get'})});
    });
}

Event.observe(document,'dom:loaded',function()
{
    //Tela de Login
    if($$('._login').length)
    {        
    }
    //Logado no sistema
    else
    {
        $$('.menu li a').each(function(obj){
            var url = obj.readAttribute('url');
            obj.writeAttribute('url', '');
            obj.observe('click', function(){new Ajax.Updater($('content'), url, {method: 'get', onSuccess: anchorToAjaxHelper})});
        })
    }
});*/

$(document).ready(function()
{
    var headers = {}
    $('.tablesorter th').each(function(i, obj)
    {
        str = obj.innerHTML;
        if(!((str) && (str.search('<span'))))
        {
            headers[i] = { sorter: false};
        }
    });
    
    $('.tablesorter').tablesorter(
    {
        headers: headers
    });
});