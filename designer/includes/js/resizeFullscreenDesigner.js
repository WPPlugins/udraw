var y5g6A={'t6A':function(V,f){return V-f;}
,'f4A':function(V,f){return V>f;}
,'Z6A':function(V,f){return V==f;}
}
;(function($){RacadDesigner["mobile"]={resizeDesigner:function(){if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i["test"](navigator["userAgent"])){$('[data-udraw="designerMenu"]')["css"]({'min-width':'350px','width':'100%'}
);$('#udraw-bootstrap [data-udraw="designerMenu"] .designer-menu-btn')["css"]('width','auto');$('#full-screen > span')["hide"]();$('#file-btn > span:not(.caret)')["hide"]();$('#pages-layers-group > #page-btn > [data-i18n]')["hide"]();$('[data-udraw="designerMenu"] > a > span, [data-udraw="designerMenu"] > form > a > span')["hide"]();RacadDesigner["designerElements"]["designerColourPicker"]["colorPicker"]('destroy');RacadDesigner["init_colour_picker"](1);$('#udraw-bootstrap')["css"]({'min-height':'300px','min-width':'300px','width':'100%','height':'100%','font-size':'10px'}
);$('[data-udraw="designerFooter"]')["css"]({'min-width':'300px','width':'100%','z-index':'996'}
);RacadDesigner["designerElements"]["canvasContainer"]["css"]({'max-width':'calc(99% - 150px)','height':'calc(99% - 60px)','min-width':'initial'}
);RacadDesigner["pagesContainer"]["container"]["css"]({'top':'80px','right':'30px','margin-left':'0px','width':'110px'}
);$('.btn btn-default')["css"]('font-size','10px');$('.modal')["css"]('overflow','auto');$('#udraw-bootstrap .toolbox-modal')["css"]('overflow','visible');$('#udraw-boostrap .toolbox-modal, #udraw-bootstrap .toolbox-modal .modal-dialog')["css"]('width','350px');$('.modal-header-btn-container')["css"]('margin-top','-5px');$('[data-udraw="zoomContainer"]').width(200);$('[data-udraw="zoomLevel"]').width(75);$('.scale-buttons')["css"]('font-size','11px');RacadDesigner["pagesContainer"]["update"]["removeClass"]('col-sm-2')["css"]('margin-left','0px','width','75%');RacadDesigner["pagesContainer"]["cancel"]["removeClass"]('col-sm-2')["css"]('margin-left','0px','width','75%');RacadDesigner["pagesContainer"]["labelInput"]["removeClass"]('col-sm-5')["addClass"]('col-sm-9')["css"]('margin-left','0px');}
}
}
;RacadDesigner["changeDisplayOrientation"]=function(V){if(y5g6A["Z6A"](V,'rtl')){$('div[data-udraw="uDrawBootstrap"]')["css"]({'direction':V,'text-align':'right'}
);$('#udraw-bootstrap .input-group input.form-control:first-child')["css"]({'border-top-left-radius':0,'border-bottom-left-radius':0,'border-top-right-radius':'4px','border-bottom-right-radius':'4px'}
);$('#udraw-bootstrap span.input-group-addon:last-child')["css"]({'border-top-left-radius':'4px','border-bottom-left-radius':'4px','border-top-right-radius':0,'border-bottom-right-radius':0,'border-right':0,'border-left':'1px solid #ccc'}
);$('#udraw-bootstrap .modal')["css"]('text-align','right');$('[data-udraw="versionContainer"], .modal-header-btn-container')["css"]('float','left');$('[data-udraw="designerToolbar"]')["css"]('right','60px');$('[data-udraw="canvasContainer"]')["css"]('right','10px');$('[data-udraw="canvasWrapper"]')["css"]('padding-right','80px');$('[data-udraw="pagesContainer"]')["css"]('margin-right','60px');$('.dropdown-menu')["css"]('text-align','right');$('.modalSideBar')["css"]({'margin-left':'-5px','margin-top':'35px','right':'initial','left':'0px'}
);$('ul.left-dropdown')["each"](function(){$(this)["removeClass"]('left-dropdown')["addClass"]('right-dropdown');}
);$('input[name="product-size"]')["next"]()["css"]('unicode-bidi','bidi-override');$('[data-udraw="topRuler"]')["css"]('right','80px');$('[data-udraw="sideRuler"]')["css"]('right','50px');$('.dropdown-menu:not(.right-dropdown)')["css"]('right',0);}
}
;RacadDesigner["togglePages"]=function(){if($('[data-udraw="pages_section"]')["is"](':visible')){$('[data-udraw="pages_section"]')["hide"]();$('[data-udraw="canvasContainer"]')["css"]('height','94%');}
else{$('[data-udraw="pages_section"]')["show"]();RacadDesigner["update_pages_section_height"]();}
}
;RacadDesigner["update_pages_section_height"]=function(){var V=y5g6A["t6A"](($('[data-udraw="body_block"]').height()*0.9),$('[data-udraw="pages_section"]').height());$('[data-udraw="canvasContainer"]').height(V);}
;$('.toolbox-modal')["draggable"]({handle:'.modal-header',containment:"[data-udraw='uDrawBootstrap']",start:function(V,f){}
,drag:function(V,f){}
,stop:function(V,f){}
}
);$('[data-udraw="uDrawBootstrap"]')["on"]('udraw-settings-updated udraw-pages-loaded',function(){if($('[data-udraw="pages_section"]')["is"](':visible')){RacadDesigner["update_pages_section_height"]();}
}
);$('[data-udraw="uDrawBootstrap"]')["on"]('open_update_label_container close_update_label_container',function(){RacadDesigner["update_pages_section_height"]();}
);$('[data-udraw="uDrawBootstrap"]')["on"]('udraw-loaded-design',function(){if(y5g6A["f4A"](RacadDesigner["pages"].length,1)){if(!$('[data-udraw="pages_section"]')["is"](':visible')){RacadDesigner["togglePages"]();}
}
}
);if(RacadDesigner["settings"]["isTemplate"]){if(!$('[data-udraw="pages_section"]')["is"](':visible')){RacadDesigner["togglePages"]();}
}
}
)(window["jQuery"]);