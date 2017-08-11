var N6B9H={'g9H':function(F,J){return F==J;}
}
;(function($){RacadDesigner["mobile"]={resizeDesigner:function(){RacadDesigner["designerElements"]["designerColourPicker"]["colorPicker"]('destroy');RacadDesigner["init_colour_picker"](1);$('.designer-side-toolbar')["css"]('min-height','initial');$('#udraw-bootstrap [data-udraw="designerMenu"] .designer-menu-btn')["css"]('width','auto');$('#full-screen > span')["hide"]();$('#file-btn > span:not(.caret)')["hide"]();$('#pages-layers-group > #page-btn > [data-i18n]')["hide"]();$('[data-udraw="designerMenu"] > a > span, [data-udraw="designerMenu"] > form > a > span')["hide"]();$('.toolbox-modal .button-shadow')["removeClass"]('button-shadow')["addClass"]('btn-default');$('[data-udraw="canvasContainer"]')["css"]('min-height','initial','min-width','initial');RacadDesigner["designerElements"]["canvasContainer"]["css"]('height','100%');}
}
;RacadDesigner["changeDisplayOrientation"]=function(F){if(N6B9H["g9H"](F,'rtl')){$('div[data-udraw="uDrawBootstrap"]')["css"]({'direction':F,'text-align':'right'}
);$('#udraw-bootstrap .input-group input.form-control:first-child')["css"]({'border-top-left-radius':0,'border-bottom-left-radius':0,'border-top-right-radius':'4px','border-bottom-right-radius':'4px'}
);$('#udraw-bootstrap span.input-group-addon:last-child')["css"]({'border-top-left-radius':'4px','border-bottom-left-radius':'4px','border-top-right-radius':0,'border-bottom-right-radius':0,'border-right':0,'border-left':'1px solid #ccc'}
);$('#udraw-bootstrap .modal')["css"]('text-align','right');$('[data-udraw="versionContainer"], .modal-header-btn-container')["css"]('float','left');$('.dropdown-menu')["css"]('text-align','right');$('ul.left-dropdown')["each"](function(){$(this)["removeClass"]('left-dropdown')["addClass"]('right-dropdown');}
);$('input[name="product-size"]')["next"]()["css"]('unicode-bidi','bidi-override');$('.dropdown-menu:not(.right-dropdown)')["css"]('right',0);$('[data-udraw="layerLabelsList"]')["css"]('text-align','right');}
}
;RacadDesigner["togglePages"]=function(){if($('[data-udraw="pagesModal"]')["is"](':visible')){$('[data-udraw="pagesModal"]')["modal"]('hide');}
else{$('[data-udraw="pagesModal"]')["modal"]('show');highlightModal(RacadDesigner["modal"]["pages"]);}
}
;}
)(window["jQuery"]);