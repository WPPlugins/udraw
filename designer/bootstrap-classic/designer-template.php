    <!-- Main Interface -->
    <div style="padding-left: 10px; padding-top: 0px;" >
    <div class="panel panel-default" style="margin-bottom: 10px;" id="racad-designer-top-toolbar-properties">
        <div class="panel-heading" style="padding-top: 3px; padding-bottom: 3px;">
            <div id="object-alignment-container" class="btn-group">
                <a href="#" id="objects-align-left" class="btn btn-default" style="padding: 3px 6px 2px;margin: 0px;"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>bg_btn_align_left.png" alt="Align Left" style="height:15px" /></a>
                <a href="#" id="objects-align-center" class="btn btn-default" style="padding: 3px 6px 2px;margin: 0px;"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>bg_btn_align_center.png" alt="Align Center" style="height:15px" /></a>
                <a href="#" id="objects-align-right" class="btn btn-default" style="padding: 3px 6px 2px;margin: 0px;"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>bg_btn_align_right.png" alt="Align Right" style="height:15px" /></a>
                <a href="#" id="objects-align-top" class="btn btn-default" style="padding: 3px 6px 2px;margin: 0px;"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>bg_btn_align_top.png" alt="Align Top" style="height:15px" /></a>
                <a href="#" id="objects-align-middle" class="btn btn-default" style="padding: 3px 6px 2px;margin: 0px;"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>bg_btn_align_middle.png" alt="Align Middle" style="height:15px" /></a>
                <a href="#" id="objects-align-bottom" class="btn btn-default" style="padding: 3px 6px 2px;margin: 0px;"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>bg_btn_align_bottom.png" alt="Align Bottom" style="height:15px" /></a>
            </div>
            <select id="font-family-selection" class="font-family-selection no-uniform" name="font-family-selection" style="min-width:150px; max-width:150px;">
                <option value="Arial" style="font-family:'Arial';">Arial</option>
                <option value="Calibri" style="font-family:'Calibri';">Calibri</option>
                <option value="Times New Roman" style="font-family:'Times New Roman'">Times New Roman</option>
                <option value="Comic Sans MS" style="font-family:'Comic Sans MS';">Comic Sans MS</option>
                <option value="French Script MT" style="font-family:'French Script MT';">French Script MT</option>
            </select>
            <select class="dropdownList font-size-select-option no-uniform" id="font-size-select-option" style="width: 70px; padding-left:5px;">
                <option>08</option>
                <option>09</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
                <option>13</option>
                <option>14</option>
                <option>15</option>
                <option>16</option>
                <option>17</option>
                <option>18</option>
                <option>19</option>
                <option>20</option>
                <option>21</option>
                <option>22</option>
                <option>23</option>
                <option>24</option>
                <option>25</option>
                <option>26</option>
                <option>27</option>
                <option selected="selected">28</option>
                <option>29</option>
                <option>30</option>
                <option>31</option>
                <option>32</option>
                <option>33</option>
                <option>34</option>
                <option>35</option>
                <option>36</option>
                <option>37</option>
                <option>38</option>
                <option>39</option>
                <option>40</option>
                <option>41</option>
                <option>42</option>
                <option>43</option>
                <option>44</option>
                <option>45</option>
                <option>46</option>
                <option>47</option>
                <option>48</option>
                <option>49</option>
                <option>50</option>
                <option>51</option>
                <option>52</option>
                <option>53</option>
                <option>54</option>
                <option>55</option>
                <option>56</option>
                <option>57</option>
                <option>58</option>
                <option>59</option>
                <option>60</option>
                <option>61</option>
                <option>62</option>
                <option>63</option>
                <option>64</option>
                <option>65</option>
                <option>66</option>
                <option>67</option>
                <option>68</option>
                <option>69</option>
                <option>70</option>
                <option>71</option>
                <option>72</option>
                <option>73</option>
                <option>74</option>
                <option>75</option>
                <option>76</option>
                <option>77</option>
                <option>78</option>
                <option>79</option>
                <option>80</option>
                <option>81</option>
                <option>82</option>
                <option>83</option>
                <option>84</option>
                <option>85</option>
                <option>86</option>
                <option>87</option>
                <option>88</option>
                <option>89</option>
                <option>90</option>
                <option>91</option>
                <option>92</option>
                <option>93</option>
                <option>94</option>
                <option>95</option>
                <option>96</option>
                <option>97</option>
                <option>98</option>
                <option>99</option>
                <option>100</option>
            </select>
            <div id="font-style-btn-group" class="btn-group" data-toggle="buttons-checkbox" style="padding-left: 5px;">
                <a class="btn btn-default" id="font-style-bold-btn" style="padding: 3px 6px 2px;margin: 0px;"><i class="fa fa-bold"></i></a>
                <a class="btn btn-default" id="font-style-italic-btn" style="padding: 3px 6px 2px;margin: 0px;"><i class="fa fa-italic"></i></a>
                <div class="btn-group">
                    <button type="button" class="btn btn-default" id="font-style-underline-btn" style="padding: 3px 6px 2px;margin: 0px;"><i class="fa fa-underline"></i></button>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="padding: 3px 6px 2px;margin: 0px;">
                        <span class="caret"></span>
                        <span class="sr-only"><?php _e('Toggle Dropdown', 'udraw') ?></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li id="font-style-overline-btn"><a href="#" style="text-decoration:overline"><span data-i18n="[html]menu_label.font-overline"></span></a></li>
                        <li id="font-style-linethrough-btn"><a href="#" style="text-decoration:line-through"><span data-i18n="[html]menu_label.font-linethrough"></span></a></li>
                    </ul>
                </div>
            </div>
            <div id="font-align-btn-group" style="padding-left: 5px;" class="btn-group">
                <a class="btn btn-default" style="padding: 3px 6px 2px;margin: 0px;" id="font-align-left"><i class="fa fa-align-left"></i></a>
                <a class="btn btn-default" style="padding: 3px 6px 2px;margin: 0px;" id="font-align-center"><i class="fa fa-align-center"></i></a>
                <a class="btn btn-default" style="padding: 3px 6px 2px;margin: 0px;" id="font-align-right"><i class="fa fa-align-right"></i></a>
            </div>
            <input type="hidden" id="designer-colour-picker" value="#000000" data-opacity="1" style="height:15px;" />
            <span><i class="fa fa-text-height" data-toggle="tooltip-top" data-original-title="Font height"></i></span>
            <select class="dropdownList font-line-height-select-option" id="font-line-height-select-option" style='max-width: 40px;'>
                <option>0.6</option>
                <option>0.7</option>
                <option>0.8</option>
                <option>0.9</option>
                <option>1</option>
                <option>1.05</option>
                <option>1.1</option>
                <option>1.2</option>
                <option selected="selected">1.3</option>
                <option>1.4</option>
                <option>1.5</option>
                <option>1.6</option>
                <option>1.7</option>
                <option>1.8</option>
                <option>1.9</option>
                <option>2</option>
                <option>2.1</option>
                <option>2.2</option>
                <option>2.3</option>
                <option>2.4</option>
                <option>2.5</option>
                <option>2.6</option>
                <option>2.7</option>
                <option>2.8</option>
                <option>2.9</option>
                <option>3</option>
            </select>
            
            <a href="#" class="btn btn-info btn-sm" id="crop-toolbar-btn" style="margin-left:115px; display:none;"><i class="fa fa-crop"></i>&nbsp;<?php _e('Crop Image', 'udraw') ?></a>           
        </div>
    </div>
    <table style="padding: 0 0 0 0; width: 66%;">
        <tr>
            <td style="min-width:640px; max-width: 640px; vertical-align:top;">
                <div id="racad-designer-ui-btn-container"></div>
            </td>
        </tr>
        <tr style="background: white; width: 100%;">
            <td style="min-width:640px; max-width: 640px; vertical-align:top;">
                <div id="racad-designer-loading" style="width: 600px; position: absolute; padding: 70px; display: inline;">
                    <div class="alert alert-info">
                        <strong><span data-i18n="[html]common_label.progress"></span></strong>
                        <div class="progress progress-striped active">
                            <div class="progress-bar" role="progressbar" aria-valuenow="105" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-danger fade in" role="alert" id="racad-designer-object-outside-alert" style="display:none; padding: 5px;">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" data-i18n="[html]text.objects-outside-dismiss"></span><span class="sr-only">Close</span></button>
                    <p data-i18n="[html]text.objects-outside-description"></p>
                </div>
                
                <div id="racad-designer" style="display: none;">
                    <canvas id="racad-designer-canvas" width="504" height="288" style="box-shadow: rgba(0,0,0,0.5) 0 0 5px;"></canvas>
                </div>
            </td>
        </tr>
        <?php if (isset($load_frontend_navigation)) { ?>
        </table>
</div>
        <div id="right-side-panels" style="top: 125px; right: 10px;">
        <table>
        <tr style="width: 375px;">
            <td>
                <div class="panel panel-default" id="designer-header-boundingbox-edit-box" style="position:relative; margin-bottom: 5px; display:none;">
                    <div class="panel-heading" style="padding: 5px 10px;">
                        <?php _e('Bounding Box', 'udraw') ?>
                    </div>
                    <div class="panel-body" style="padding: 5px;">
                        <div class="row" id="boundingbox-create-btn-area">
                                <a href="#" id="boundingbox-create-btn" class="btn btn-xs btn-success col-sm-3" style="margin-left:15px;"><i class="fa fa-plus-circle"></i>&nbsp;<?php _e('Create', 'udraw') ?></a>
                        </div>
                        <div id="boundingbox-control-div" style="display:none;">
                            <div class="row" id="boundingbox-remove-btn-area">
                                <a href="#" id="boundingbox-lock-btn" class="btn btn-xs btn-info col-sm-3" style="margin-left:15px;"><i class="fa fa-lock"></i>&nbsp;<?php _e('Lock', 'udraw') ?></a>
                                <a href="#" id="boundingbox-unlock-btn" class="btn btn-xs btn-info col-sm-3" style="margin-left:15px;"><i class="fa fa-unlock"></i>&nbsp;<?php _e('Unlock', 'udraw') ?></a>
                                <a href="#" id="boundingbox-remove-btn" class="btn btn-xs btn-danger col-sm-3" style="margin-left:15px;"><i class="fa fa-times-circle"></i>&nbsp;<?php _e('Remove', 'udraw') ?></a>
                                <a href="#" id="boundingbox-udpate-btn" class="btn btn-xs btn-success col-sm-3" style="margin-left:15px;"><i class="fa fa-check-circle"></i>&nbsp;<?php _e('Update', 'udraw') ?></a>
                            </div>
                            <div class="row" style="padding-top:5px;">
                                <div id="boundingbox-size-options">
                                    <label class="col-md-2 control-label" style="margin-top:5px;"><?php _e('Width', 'udraw') ?></label>
                                    <span class="col-md-4">
                                        <span class="input-group">
                                            <input type="text" class="form-control" tabindex="1" id="boundingbox-width" value="3.5" style="height:28px;" />
                                            <span class="input-group-addon"><?php _e('Inch', 'udraw') ?></span>
                                        </span>
                                    </span>

                                    <label class="col-md-2 control-label" style="margin-top:5px;"><?php _e('Height', 'udraw') ?></label>
                                    <span class="col-md-4" style="margin-top: 2px;">
                                        <span class="input-group">
                                            <input type="text" class="form-control" tabindex="1" id="boundingbox-height" value="2" style="height:28px;" />
                                            <span class="input-group-addon"><?php _e('Inch', 'udraw') ?></span>
                                        </span>
                                    </span>
                                    <br />
                                </div>
                            </div>
                            <div class="row">
                                <div id="boundingbox-visual-options">
                                    <span class="col-md-8" style="margin-top: 2px;">
                                        <span class="input-group">
                                            <span class="input-group-addon"><?php _e('Thickness', 'udraw') ?></span>
                                            <input class="boundingbox-spinner spinedit noselect form-control" type="text" id="boundingbox-stroke-size" value="1" style="height:28px;" />
                                        </span>
                                    </span>
                                    <span class="col-md-4">
                                            <input type="color" id="boundingbox-colour-picker" value="#000000" data-opacity="1" style="height:15px;" />
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>                    
        <tr  style="width: 375px;">
            <td>
                <div class="panel panel-primary" id="designer-header-text-box" style="position:relative; margin-bottom: 5px; display: none; ">
                    <div class="panel-heading" style="padding: 5px 10px;">
                        <span data-i18n="[html]header_label.edit-text-header"></span>
                    </div>
                    <div class="panel-body" style="padding: 5px;">                                    
                        <textarea id="current-text-textarea" class="form-control" style="margin-top:5px; height:75px;"></textarea>
                    </div>
                </div>
            </td>
        </tr>
        <tr style="width: 375px;">
            <td>
                <div class="panel panel-primary" id="designer-gradient-text-box" style="position:relative; margin-bottom: 5px; display: none; ">
                    <div class="panel-heading" style="padding: 5px 10px;">
                        <span data-i18n="[html]menu_label.gradient"></span>
                    </div>
                    <div class="panel-body" style="padding: 5px;">
                        <div id="text-gradient">
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr style="width: 375px;">
            <td>
                <div class="panel panel-default" id="designer-header-pages-box" style="position:relative; margin-bottom: 5px; display:none;">
                    <div class="panel-heading" style="padding: 5px 15px;">
                        <span data-i18n="[html]ui-controls.pages-header"></span>
                        <div style="float:right;">                                        
                            <a href="#" class="btn btn-success btn-xs" id="create-new-page-btn" style="padding-top:0px;"><i class="fa fa-plus-circle"></i>&nbsp;<span data-i18n="[html]button_label.add-page"></span></a>
                            <a href="#" class="btn btn-default btn-xs" id="hide-designer-header-pages-box" style="padding-top:0px;"><i class="fa fa-chevron-up"></i><span data-i18n="[html]common_label.hide"></span></a>
                        </div>
                    </div>
                    <div class="panel-body" style="padding: 5px;">
                        <div class="scroll-content" id="designer-pages-content">

                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr style="width: 375px;">
            <td>
                <div class="panel panel-primary" id="designer-header-page-edit-box" style="position:relative; margin-bottom: 5px; display:none;">
                    <div class="panel-heading" style="padding: 5px 10px;">
                        <span data-i18n="[html]ui-controls.pages-edit-header"></span>
                    </div>
                    <div class="panel-body" style="padding: 5px;">
                        <div class="row">
                            <input type="text" class="col-sm-5" id="edit-page-label-input" style="margin-left:15px;" />
                            <a href="#" id="update-page-label-btn" class="btn btn-xs btn-success col-sm-2" style="margin-left:10px;"><i class="fa fa-check-circle"></i>&nbsp;<span data-i18n="[html]common_label.update"></span></a>
                            <a href="#" id="cancel-page-label-btn" class="btn btn-xs btn-danger col-sm-2" style="margin-left:60px;"><i class="fa fa-times-circle"></i>&nbsp;<span data-i18n="[html]ui-controls.pages-edit-cancel-btn"></span></a>
                        </div>
                    </div>
                </div>
            </td>
        </tr>                  
        <tr  style="width: 375px;">
            <td>
                <div class="panel panel-default designer-header" id="designer-header-layer-box">
                    <div class="panel-heading designer-panel-heading">
                        <span data-i18n="[html]common_label.layers"></span>
                        <div style="float:right;">
                            <a href="#" class="btn btn-default btn-xs" id="hide-designer-layers-box" style="padding-top:0px;"><i class="fa fa-chevron-up"></i><span data-i18n="[html]common_label.hide"></span></a>
                            <a href="javascript:RacadDesigner.Layers.reset();" class="btn btn-default btn-xs" id="refresg-designer-layers-box" style="padding-top:0px;"><i class="fa fa-refresh"></i><span data-i18n="[html]common_label.refresh"></span></a>
                        </div>
                    </div>
                    <div class="scroll-content" style="padding: 5px;">
                        <ul class="layer-box" id="layersContainer"></ul>
                    </div>
                </div>
            </td>
        </tr>
        </table>
        </div>
        <?php } else { ?>
        <tr style="width: 375px;">
            <td>
                <div class="panel panel-default" id="designer-header-boundingbox-edit-box" style="position:relative; margin-bottom: 5px; display:none;">
                    <div class="panel-heading" style="padding: 5px 10px;">
                        <?php _e('Bounding Box', 'udraw') ?>
                    </div>
                    <div class="panel-body" style="padding: 5px;">
                        <div class="row" id="boundingbox-create-btn-area">
                                <a href="#" id="boundingbox-create-btn" class="btn btn-xs btn-success col-sm-3" style="margin-left:15px;"><i class="fa fa-plus-circle"></i>&nbsp;<?php _e('Create', 'udraw') ?></a>
                        </div>
                        <div id="boundingbox-control-div" style="display:none;">
                            <div class="row" id="boundingbox-remove-btn-area">
                                <a href="#" id="boundingbox-lock-btn" class="btn btn-xs btn-info col-sm-3" style="margin-left:15px;"><i class="fa fa-lock"></i>&nbsp;<?php _e('Lock', 'udraw') ?></a>
                                <a href="#" id="boundingbox-unlock-btn" class="btn btn-xs btn-info col-sm-3" style="margin-left:15px;"><i class="fa fa-unlock"></i>&nbsp;<?php _e('Unlock', 'udraw') ?></a>
                                <a href="#" id="boundingbox-remove-btn" class="btn btn-xs btn-danger col-sm-3" style="margin-left:15px;"><i class="fa fa-times-circle"></i>&nbsp;<?php _e('Remove', 'udraw') ?></a>
                                <a href="#" id="boundingbox-udpate-btn" class="btn btn-xs btn-success col-sm-3" style="margin-left:15px;"><i class="fa fa-check-circle"></i>&nbsp;<?php _e('Update', 'udraw') ?></a>
                            </div>
                            <div class="row" style="padding-top:5px;">
                                <div id="boundingbox-size-options">
                                    <label class="col-md-2 control-label" style="margin-top:5px;"><?php _e('Width', 'udraw') ?></label>
                                    <span class="col-md-4">
                                        <span class="input-group">
                                            <input type="text" class="form-control" tabindex="1" id="boundingbox-width" value="3.5" style="height:28px;" />
                                            <span class="input-group-addon"><?php _e('Inch', 'udraw') ?></span>
                                        </span>
                                    </span>

                                    <label class="col-md-2 control-label" style="margin-top:5px;"><?php _e('Height', 'udraw') ?></label>
                                    <span class="col-md-4" style="margin-top: 2px;">
                                        <span class="input-group">
                                            <input type="text" class="form-control" tabindex="1" id="boundingbox-height" value="2" style="height:28px;" />
                                            <span class="input-group-addon"><?php _e('Inch', 'udraw') ?></span>
                                        </span>
                                    </span>
                                    <br />
                                </div>
                            </div>
                            <div class="row">
                                <div id="boundingbox-visual-options">
                                    <span class="col-md-8" style="margin-top: 2px;">
                                        <span class="input-group">
                                            <span class="input-group-addon"><?php _e('Thickness', 'udraw') ?></span>
                                            <input class="boundingbox-spinner spinedit noselect form-control" type="text" id="boundingbox-stroke-size" value="1" style="height:28px;" />
                                        </span>
                                    </span>
                                    <span class="col-md-4">
                                            <input type="color" id="boundingbox-colour-picker" value="#000000" data-opacity="1" style="height:15px;" />
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>                    
        <tr  style="width: 375px;">
            <td>
                <div class="panel panel-primary" id="designer-header-text-box" style="position:relative; margin-bottom: 5px; display: none; ">
                    <div class="panel-heading" style="padding: 5px 10px;">
                        <span data-i18n="[html]header_label.edit-text-header"></span>
                    </div>
                    <div class="panel-body" style="padding: 5px;">                                    
                        <textarea id="current-text-textarea" class="form-control" style="margin-top:5px; height:75px;"></textarea>
                    </div>
                </div>
            </td>
        </tr>
        <tr style="width: 375px;">
            <td>
                <div class="panel panel-primary" id="designer-gradient-text-box" style="position:relative; margin-bottom: 5px; display: none; ">
                    <div class="panel-heading" style="padding: 5px 10px;">
                        <span data-i18n="[html]menu_label.gradient"></span>
                    </div>
                    <div class="panel-body" style="padding: 5px;">
                        <div id="text-gradient">
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr style="width: 375px;">
            <td>
                <div class="panel panel-default" id="designer-header-pages-box" style="position:relative; margin-bottom: 5px; display:none;">
                    <div class="panel-heading" style="padding: 5px 15px;">
                        <span data-i18n="[html]ui-controls.pages-header"></span>
                        <div style="float:right;">                                        
                            <a href="#" class="btn btn-success btn-xs" id="create-new-page-btn" style="padding-top:0px;"><i class="fa fa-plus-circle"></i>&nbsp;<span data-i18n="[html]button_label.add-page"></span></a>
                            <a href="#" class="btn btn-default btn-xs" id="hide-designer-header-pages-box" style="padding-top:0px;"><i class="fa fa-chevron-up"></i><span data-i18n="[html]common_label.hide"></span></a>
                        </div>
                    </div>
                    <div class="panel-body" style="padding: 5px;">
                        <div class="scroll-content" id="designer-pages-content">

                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr style="width: 375px;">
            <td>
                <div class="panel panel-primary" id="designer-header-page-edit-box" style="position:relative; margin-bottom: 5px; display:none;">
                    <div class="panel-heading" style="padding: 5px 10px;">
                        <span data-i18n="[html]ui-controls.pages-edit-header"></span>
                    </div>
                    <div class="panel-body" style="padding: 5px;">
                        <div class="row">
                            <input type="text" class="col-sm-5" id="edit-page-label-input" style="margin-left:15px;" />
                            <a href="#" id="update-page-label-btn" class="btn btn-xs btn-success col-sm-2" style="margin-left:10px;"><i class="fa fa-check-circle"></i>&nbsp;<span data-i18n="[html]common_label.update"></span></a>
                            <a href="#" id="cancel-page-label-btn" class="btn btn-xs btn-danger col-sm-2" style="margin-left:60px;"><i class="fa fa-times-circle"></i>&nbsp;<span data-i18n="[html]ui-controls.pages-edit-cancel-btn"></span></a>
                        </div>
                    </div>
                </div>
            </td>
        </tr>                  
        <tr  style="width: 375px;">
            <td>
                <div class="panel panel-default designer-header" id="designer-header-layer-box">
                    <div class="panel-heading designer-panel-heading">
                        <span data-i18n="[html]common_label.layers"></span>
                        <div style="float:right;">
                            <a href="#" class="btn btn-default btn-xs" id="hide-designer-layers-box" style="padding-top:0px;"><i class="fa fa-chevron-up"></i><span data-i18n="[html]common_label.hide"></span></a>
                            <a href="javascript:RacadDesigner.Layers.reset();" class="btn btn-default btn-xs" id="refresg-designer-layers-box" style="padding-top:0px;"><i class="fa fa-refresh"></i><span data-i18n="[html]common_label.refresh"></span></a>
                        </div>
                    </div>
                    <div class="scroll-content" style="padding: 5px;">
                        <ul class="layer-box" id="layersContainer"></ul>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
<?php } ?>