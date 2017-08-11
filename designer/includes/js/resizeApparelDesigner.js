(function($){RacadDesigner["mobile"]={resizeDesigner:function(){if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i["test"](navigator["userAgent"])){$('#udraw-bootstrap')["css"]({'min-height':'300px','min-width':'300px','width':'100%','height':'100%'}
);$('.btn btn-default')["css"]('font-size','10px');$('.modal')["css"]('overflow','auto');$('#udraw-bootstrap .toolbox-modal, #udraw-bootstrap .left-toolbox-modal')["css"]('overflow','visible');$('.scale-buttons')["css"]('font-size','11px');RacadDesigner["pagesContainer"]["list"]["css"]('width','100%');$('.slick-arrow')["attr"]('style','transform: scale(2)');}
}
}
;}
)(window["jQuery"]);