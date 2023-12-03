// the address in Rwanda javascript to deal with all administration
class address{
    constructor(server = ""){
       // definition of html ids for selected item
       const select_ids = {
         "province":"the_province_select_option",
         "district":"the_district_select_option",
         "sector":"the_sectors_select_option",
         "cell":"the_cells_select_option",
         "village":"the_village_select_option"
       };
 
       
 
       var readerClass = [
         {
            "class":".pip-address-reader",
            "attr":"data-address"
         }
       ];
 
       this.classData = function(clss,attr = "data-address"){
          readerClass.push({
             "class":clss,
             "attr":attr
          });
       }
 
       // reading all address
 
       this.readAddress = function(){
          for(var i = 0; i < readerClass.length; i++){
             if(readerClass[i].class.substring(0,1)=="."){
                 var els = $(readerClass[i].class);
                 for(var ii = 0; ii < els.length; ii++){
                     var addressData = $(els[ii]).attr(readerClass[i].attr);
                     
                     if(addressData.substring(1,2)=="L"){
                         var rets = "";
                         var AddressLevel = addressData.substring(0,1);
                         var AddressIds = addressData.substring(2,addressData.length).split("_");
                         this.Provinces();
                         this.Districts(AddressIds[0]);
                         this.province = this.getProvince(AddressIds[0]);
                         rets += this.province.name;
                         if(AddressIds.length>1){
                             this.Sectors(AddressIds[0],AddressIds[1]);
                             this.district = this.getItem(AddressIds[1],this.dist);
                             rets += " / "+this.district.name;
                             console.log(this.dist);
                             console.log(AddressIds[1]);
                         }
                         if(AddressIds.length>2){
                             this.Cells(AddressIds[0],AddressIds[1],AddressIds[2]);
                             this.sector = this.getItem(AddressIds[2],this.sect);
                             rets += " / "+this.sector.name;
                         }
                         if(AddressIds.length>3){
                             this.Villages(AddressIds[0],AddressIds[1],AddressIds[2],AddressIds[3]);
                             this.cellure = this.getItem(AddressIds[3],this.cell);
                             rets += " / "+this.cellure.name;
                         }
                         $(els[ii]).html(rets);
                     }
                 }
             }
          }
       }
 
       // definition of variable id selector
 
       var province_var_Id = null;
       var district_var_Id = null;
       var sector_var_id = null;
       var cell_var_id = null;
       var village_var_id = null;
 
 
       var province_var_s = [];
       var district_var_s = [];
       var sector_var_s = [];
       var cell_var_s = [];
       var village_var_s = [];
 
       this.checkValidId = function(){
            return (province_var_s.length===district_var_s.length)
            &&(district_var_s.length===sector_var_s.length)
            &&(sector_var_s.length===cell_var_s.length)
            &&(cell_var_s.length===village_var_s.length)
            &&(village_var_s.length===province_var_s.length);
       }
 
       this.ProvinceSelects = function(the_id,defalt = -1, disab = false){
         province_var_s.push({
            "name":the_id,
            "deflt":defalt,
            "disab":disab
         });
         return this;
       }
       this.DistrictSelects = function(the_id,defalt = -1, disab = false){
         district_var_s.push({
             "name":the_id,
             "deflt":defalt,
             "disab":disab
          });
         return this;
       }
       this.SectorSelects = function(the_id,defalt = -1, disab = false){
         sector_var_s.push({
             "name":the_id,
             "deflt":defalt,
             "disab":disab
          });
         return this;
       }
       this.CellSelects = function(the_id,defalt = -1, disab = false){
         cell_var_s.push({
             "name":the_id,
             "deflt":defalt,
             "disab":disab
          });
         return this;
       }
       this.VillageSelects = function(the_id,defalt = -1, disab = false){
         village_var_s.push({
             "name":the_id,
             "deflt":defalt,
             "disab":disab
          });
         return this;
       }
 
       this.ProvinceSelect = function(the_id = null){
         if(the_id==null) return province_var_Id;
          province_var_Id = the_id;
          return this;
       }
       this.DistrictSelect = function(the_id = null){
         if(the_id==null) return district_var_Id;
         district_var_Id = the_id;
         return this;
       }
       this.SectorSelect = function(the_id = null){
         if(the_id==null) return sector_var_id;
         sector_var_id = the_id;
         return this;
       }
       this.CellSelect = function(the_id = null){
         if(the_id==null) return cell_var_id;
         cell_var_id = the_id;
         return this;
       }
       this.VillageSelect = function(the_id = null){
         if(the_id==null) return village_var_id;
         village_var_id = the_id;
         return this;
       }
 
       
 
       var THIS = this;
 
 
       this.selects = function(){
         return select_ids;
       }
 
       this.init = function(){
         $(`#${this.selects().province}`).change( function(){
              var provId = $(this).val();
              if(parseInt(provId)>0){
                 THIS.Districts(provId);
                 $(`#${THIS.selects().district}`).show().html(THIS.defaultOption("all districts"));
                 $(`#${THIS.selects().district}`).append(THIS.Options(THIS.dist));
                 THIS.initDist();
              }
         });
       }
 
       this.initDist = function(){
         $(`#${this.selects().district}`).change( function(){
             var distId = $(this).val();
             if(parseInt(distId)>-1){
                var provId = distId.substring(0,1);
                var theDistId = distId.substring(1,distId.length);
                THIS.Sectors(provId,parseInt(theDistId));
                $(`#${THIS.selects().sector}`).show().html(THIS.defaultOption("all sectors"));
                $(`#${THIS.selects().sector}`).append(THIS.Options(THIS.sect));
                THIS.initSect();
             }
         });
       }
 
       this.initSect = function(){
         $(`#${this.selects().sector}`).change( function(){
             var sectId = $(this).val();
             if(parseInt(sectId)>-1){
                 var provId = parseInt(sectId.substring(0,1));
                 var theDistId = parseInt(sectId.substring(1,3));
                 var theSectId = parseInt(sectId.substring(3,sectId.length));
                 THIS.Cells(provId,theDistId,theSectId);
                 $(`#${THIS.selects().cell}`).show().html(THIS.defaultOption("all cells"));
                 $(`#${THIS.selects().cell}`).append(THIS.Options(THIS.cell));
                 THIS.initCells();
             }
         })
       }
 
       this.initCells = function(){
         $(`#${this.selects().cell}`).change( function(){
             var cellId = $(this).val();
             if(parseInt(cellId)>0){
                 var provId = parseInt(cellId.substring(0,1));
                 var theDistId = parseInt(cellId.substring(1,3));
                 var theSectId = parseInt(cellId.substring(3,5));
                 var theCellId = parseInt(cellId.substring(5,cellId.length));
                 THIS.Villages(provId,theDistId,theSectId,theCellId);
                 $(`#${THIS.selects().village}`).show().html(THIS.defaultOption("all villages"));
                 $(`#${THIS.selects().village}`).append(THIS.Options(THIS.vill));
             }
         });
       }
 
       var contents = [];
       this.readFun = function(){
         console.log("Ready"); 
       }
 
       this.prov = [];
       this.dist = [];
       this.sect = [];
       this.cell = [];
       this.vill = [];
       // variables to hold 
       this.province = {
         "name":0,
         "id":0,
         "idx":0
       }
       this.district = {
         "name":0,
         "id":0,
         "idx":0
       }
       this.sector = {
         "name":0,
         "id":0,
         "idx":0
       }
       this.cellure = {
         "name":0,
         "id":0,
         "idx":0
       }
       this.village = {
         "name":0,
         "id":0,
         "idx":0
       }
 
       var selectLevel = 0;
       var selectedNum = "";
 
       
 
       this.initSelect = function(){
         if(province_var_Id==null) return this;
         var theHiddenAddressInput = document.createElement("input");
         $(theHiddenAddressInput).attr("name","pip_address_info");
         $(theHiddenAddressInput).attr("type","text");
         $(theHiddenAddressInput).attr("id",input_form_id);
         $(theHiddenAddressInput).css({
             "display":"none"
         });
         $(province_var_Id).parent().append(theHiddenAddressInput);
         
         this.Provinces();
         $(province_var_Id).show().html(THIS.defaultOption("select a province"));
         if(!(district_var_Id==null))
         $(district_var_Id).show().html(THIS.defaultOption("select a district"));
         if(!(sector_var_id==null))
         $(sector_var_id).show().html(THIS.defaultOption("select a sector"));
         if(!(cell_var_id==null))
         $(cell_var_id).show().html(THIS.defaultOption("select a cell"));
         if(!(village_var_id==null))
         $(village_var_id).show().html(THIS.defaultOption("select a village"));
 
         $(province_var_Id).append(this.Options(this.prov)).off("change").change( function(){    
             var provId = $(this).val();
             if(parseInt(provId)>0){
                selectLevel = 1;
                selectedNum = `${provId}`;
                $(`#${input_form_id}`).val(`${selectLevel}L${selectedNum}`);
                THIS.Districts(provId);
                if(!(district_var_Id==null)){
                     $(district_var_Id).show().html(THIS.defaultOption("select a district"));
                     $(district_var_Id).append(THIS.Options(THIS.dist));
                     THIS.initSelectDist();
                }
             }
        });
        return this;
       }
       this.initSelects = function(){
         if(this.checkValidId()){
             this.Provinces();
             for(var i = 0; i < province_var_s.length; i++){
                 this.refresh();
                 var theHiddenAddressInput = document.createElement("input");
                 $(theHiddenAddressInput).attr("name","pip_address_info");
                 $(theHiddenAddressInput).attr("type","text");
                 $(theHiddenAddressInput).attr("id",input_form_id);
                 $(theHiddenAddressInput).css({
                     "display":"none"
                 });
                 $(province_var_s[i].name).parent().append(theHiddenAddressInput);
                 $(province_var_s[i].name).append(this.Options(this.prov));
                 $(district_var_s[i].name).show().html(THIS.defaultOption("select a district"));
                 $(sector_var_s[i].name).show().html(THIS.defaultOption("select a sector"));
                 $(cell_var_s[i].name).show().html(THIS.defaultOption("select a cell"));
                 $(village_var_s[i].name).show().html(THIS.defaultOption("select a village"));
                 if(province_var_s[i].deflt>0){
                     $(province_var_s[i].name).prop('selectedIndex',province_var_s[i].deflt);
                     $(`#${input_form_id}`).val(`1L${province_var_s[i].deflt}`);
                 }
                 if(province_var_s[i].disab){
                     $(province_var_s[i].name).prop('disabled',true);
                 } else {
                     $(province_var_s[i].name).off("change").change( function(){
                         var provId = $(this).val();
                         if(parseInt(provId)>0){
                             $(`#${input_form_id}`).val(`1L${provId}`);
                             THIS.Districts(provId);
                             $(district_var_s[i].name).show().html(THIS.defaultOption("select a district"));
                             $(district_var_s[i].name).append(THIS.Options(THIS.dist));
                             THIS.initSelectDists(i);
                         }
                     });
                 }
             }
         }
         return this;
       }
       this.initSelectDist = function(){
         if(!(sector_var_id==null))
         $(sector_var_id).show().html(THIS.defaultOption("select a sector"));
         if(!(cell_var_id==null))
         $(cell_var_id).show().html(THIS.defaultOption("select a cell"));
         if(!(village_var_id==null))
         $(village_var_id).show().html(THIS.defaultOption("select a village"));
         $(district_var_Id).off("change").change( function(){
             var distId = $(this).val();
             if(parseInt(distId)>-1){
                 
                var provId = distId.substring(0,1);
                var theDistId = distId.substring(1,distId.length);
                selectLevel = 2;
                selectedNum = `${provId}_${parseInt(theDistId)}`;
                $(`#${input_form_id}`).val(`${selectLevel}L${selectedNum}`);
 
                if(!(sector_var_id==null)){
                   THIS.Sectors(provId,parseInt(theDistId));
                   $(sector_var_id).show().html(THIS.defaultOption("select a sector"));
                   $(sector_var_id).append(THIS.Options(THIS.sect));
                }
                THIS.initSelectSect();
             }
         });
       }
       this.initSelectDists = function(i){
         $(sector_var_s[i].name).show().html(this.defaultOption("select a sector"));
         $(cell_var_s[i].name).show().html(this.defaultOption("select a cell"));
         $(village_var_s[i].name).show().html(this.defaultOption("select a village"));
         if(district_var_s[i].disab){
             
         }
         $(district_var_Id).off("change").change( function(){
             var distId = $(this).val();
             if(parseInt(distId)>-1){
                 
                var provId = distId.substring(0,1);
                var theDistId = distId.substring(1,distId.length);
                selectLevel = 2;
                selectedNum = `${provId}_${parseInt(theDistId)}`;
                $(`#${input_form_id}`).val(`${selectLevel}L${selectedNum}`);
 
                if(!(sector_var_id==null)){
                   THIS.Sectors(provId,parseInt(theDistId));
                   $(sector_var_id).show().html(THIS.defaultOption("select a sector"));
                   $(sector_var_id).append(THIS.Options(THIS.sect));
                }
                THIS.initSelectSect();
             }
         });
       }
       this.initSelectSect = function(){
         if(!(cell_var_id==null))
         $(cell_var_id).show().html(THIS.defaultOption("select a cell"));
         if(!(village_var_id==null))
         $(village_var_id).show().html(THIS.defaultOption("select a village"));
         $(sector_var_id).off("change").change( function(){
             var sectId = $(this).val();
             if(parseInt(sectId)>-1){
                 selectLevel = 3;
                 var provId = parseInt(sectId.substring(0,1));
                 var theDistId = parseInt(sectId.substring(1,3));
                 var theSectId = parseInt(sectId.substring(3,sectId.length));
                 selectedNum = `${provId}_${theDistId}_${theSectId}`;
                 $(`#${input_form_id}`).val(`${selectLevel}L${selectedNum}`);
                 if(!(cell_var_id==null)){
                     THIS.Cells(provId,theDistId,theSectId);
                     $(cell_var_id).show().html(THIS.defaultOption("select a cell"));
                     $(cell_var_id).append(THIS.Options(THIS.cell));
                 }
                 THIS.initSelectCells();
             }
         })
       }
       this.initSelectCells = function(){
         if(!(village_var_id==null))
         $(village_var_id).show().html(THIS.defaultOption("select a village"));
         $(cell_var_id).off("change").change( function(){
             var cellId = $(this).val();
             if(parseInt(cellId)>0){
                 selectLevel = 4;
                 var provId = parseInt(cellId.substring(0,1));
                 var theDistId = parseInt(cellId.substring(1,3));
                 var theSectId = parseInt(cellId.substring(3,5));
                 var theCellId = parseInt(cellId.substring(5,cellId.length));
                 selectedNum = `${provId}_${theDistId}_${theSectId}_${theCellId}`;
                 $(`#${input_form_id}`).val(`${selectLevel}L${selectedNum}`);
                 THIS.Villages(provId,theDistId,theSectId,theCellId);
                 if(!(village_var_id==null)){
                     $(village_var_id).show().html(THIS.defaultOption("select a village"));
                     $(village_var_id).append(THIS.Options(THIS.vill));
                     $(village_var_id).change( function(){
                         var villId = $(this).val();
                         selectLevel = 5;
                         selectedNum = `${villId}`;
                         $(`#${input_form_id}`).val(`.${selectedNum}`);
                     })
                 }
                 
             }
         });
       }
 
 
       if(server.length>0){
         http(server+"locations_in_rwanda",".json")
         .loading( function(progress){
            console.log(progress);
         })
         .success( function(conts){
            try{
                contents = JSON.parse(conts);
                THIS.readFun(THIS);
                
                var elements = $(".pip-rwanda-location");
                for(var i = 0; i < elements.length;i++){
                 var type = parseInt($(elements[i]).attr("data-type"));
                 var data_id = $(elements[i]).attr("data-element");
                 
                 switch(type){
                     case 0 : {
                         $(elements[i]).html(THIS.Provinces().getProvince(data_id).name);
                         break;
                         //console.log(THIS.getProvince);
                     }
                     case 1 : {
                         $(elements[i]).html(THIS
                         .getDistrict(data_id).name);
                         break;
                     }
                     case 2 : {
                         $(elements[i]).html(THIS
                             .getSector(data_id).name);
                         break;
                     }
                 }
                 
 
                }
            } catch(e){
                console.log(e);
            }
         })
         .failed( function(err){
            console.log(err);
         }).post();
       }
       
     
       this.conts = function(data = []){
         if(data.length>0){
             contents=data;
             return this;
         }
         return contents;
       }
 
       
    }
    ready(fun){
      this.readFun = fun;
      return this;
    }
    Provinces(){
       this.prov = [];
       if(this.conts().length>0){
          for(var i = 0; i < this.conts().length; i++){
             this.prov.push({
                 "name":this.conts()[i].name,
                 "id":this.conts()[i].id,
                 "idx":i+1
             });
          }
       }
       else console.log("No records found");
       return this;
    }
    getProvince(id){
     for(var i = 0; i < this.prov.length; i++){
         if(this.prov[i].id==id){
            return this.prov[i];
         }
      }
      return {
        "name":"not found",
        "id":"0",
        "idx":"-1"
      };
    }
    _getProvince(id){
     for(var i = 0; i < this.prov.length; i++){
         if(this.prov[i].idx==id){
            return this.prov[i];
         }
      }
      return {
        "name":"not found",
        "id":"0",
        "idx":"-1"
      };
    }
    setProvinces(id){
        this.province = this.getProvince(id);
    }
    
 //    var sectId = parseInt(full_id.substring(3,5));
 //    var cellId = parseInt(full_id.substring(5,7));
    getDistrict(id){
     
     var provId = parseInt(id.substring(0,1));
     var distId = parseInt(id.substring(1,3));
     this._getProvince(provId);
     this.Districts(provId);
     for(var i = 0; i < this.dist.length; i++){
         if(this.dist[i].idx==distId){
            return this.dist[i];
         }
      }
      return {
        "name":"not found",
        "id":"0",
        "idx":"-1"
      };
    }
 
    getSector(id){
     
     var provId = parseInt(id.substring(0,1));
     var distId = parseInt(id.substring(1,3));
     var sectId = parseInt(id.substring(3,5));
     
     this._getProvince(provId);
     this.Districts(provId);
     this.Sectors(provId,distId);
     for(var i = 0; i < this.sect.length; i++){
         if(this.sect[i].idx==sectId){
            return this.sect[i];
         }
      }
      return {
        "name":"not found",
        "id":"0",
        "idx":"-1"
      };
    }
 
    getItem(id,item){
       for(var i = 0; i < item.length; i++){
          if(item[i].idx==id){
             return item[i];
          }
       }
       return {
         "name":"not found",
         "id":"0",
         "idx":"-1"
       };
    }
    Districts(prov = 1){
       this.dist = [];
       if(this.conts().length){
         for(var i = 0; i < this.conts().length; i++){
             if(this.conts()[i].id==prov){
                 this.setProvinces(prov);
                 for(var ii = 0; ii < this.conts()[i].districts.length; ii++){
                    this.dist.push({
                       "name":this.conts()[i].districts[ii].name,
                       "id":this.conts()[i].districts[ii].id,
                       "idx":ii+1
                    });
                 }
                 break;
             }
          }
       }
       else console.log("No records found"); 
       return this;
    }
    GSectors(dist_id){
     var provId = parseInt(dist_id.substring(0,1));
     var distId = parseInt(dist_id.substring(1,dist_id.length));
     return this.Sectors(provId,distId);
    }
    Sectors(prov = 1, dist = 1){
     this.sect = [];
     if(this.conts().length){
         for(var i = 0; i < this.conts().length;i++){
             if(this.conts()[i].id==prov){
                 this.Districts(prov);
                 for(var ii = 0; ii < this.conts()[i].districts.length; ii++){
                     var pref = "0";
                     if((dist/10)>=1) pref="";
                     var dist_id = parseInt(prov+pref+(dist));
                     if(dist_id==this.conts()[i].districts[ii].id){
                         var all_secs = this.conts()[i].districts[ii].sectors;
                         for(var iii=0;iii<all_secs.length;iii++){
                             this.sect.push({
                                 "name":all_secs[iii].name,
                                 "id":all_secs[iii].id,
                                 "idx":iii+1
                             });
                         }
                         ///console.log(this.sect);
                         break;
                     }
                 } 
                 break;
             } 
             
         }
     } 
     else console.log("No records found");
     return this;
    }
    GCells(sect_id){
     var provId = parseInt(sect_id.substring(0,1));
     var distId = parseInt(sect_id.substring(1,3));
     var sectId = parseInt(sect_id.substring(3,sect_id.length));
     return this.Cells(provId,distId,sectId);
    }
    Cells(prov = 1, dist = 1, sect = 1){
       this.cell = [];
       if(this.conts().length){
         for(var i = 0; i < this.conts().length;i++){
             if(this.conts()[i].id==prov){
                 var pref = "0";
                 if((dist/10)>=1) pref="";
                 var dist_id = parseInt(prov+pref+(dist));
                 this.Districts(prov);
                 this.Sectors(prov,dist);
                 for(var ii = 0; ii < this.conts()[i].districts.length; ii++){
                     if(dist_id==this.conts()[i].districts[ii].id){
                         var pref = "0";
                         if((sect/10)>=1) pref="";
                         var sect_id = dist_id+pref+sect;
                         for(var iii=0; iii< this.conts()[i].districts[ii].sectors.length; iii++){
                             if(parseInt(sect_id)==this.conts()[i].districts[ii].sectors[iii].id){
                                 for(var j = 0; j < this.conts()[i].districts[ii].sectors[iii].cells.length; j++){
                                     this.cell.push({
                                         "name":this.conts()[i].districts[ii].sectors[iii].cells[j].name,
                                         "id":this.conts()[i].districts[ii].sectors[iii].cells[j].id,
                                         "idx":j+1
                                     });
                                 }
                                 break;
                             }
                         }
                         break;
                     }
                 }
                 break;
             }
         }
       } else console.log("Empty contents");
       return this;
    }
    GVillages(cell_id){
     var provId = parseInt(cell_id.substring(0,1));
     var distId = parseInt(cell_id.substring(1,3));
     var sectId = parseInt(cell_id.substring(3,5));
     var cellId = parseInt(cell_id.substring(5,cell_id.length));
     return this.Villages(provId,distId,sectId,cellId);
    }
    Villages(prov = 1, dist = 1, sect = 1, cell = 1){
     this.vill = [];
     if(this.conts().length){
         for(var i = 0; i < this.conts().length;i++){
             if(this.conts()[i].id==prov){
                 var pref = "0";
                 if((dist/10)>=1) pref="";
                 var dist_id = parseInt(prov+pref+(dist));
                 for(var ii = 0; ii < this.conts()[i].districts.length; ii++){
                     if(dist_id==this.conts()[i].districts[ii].id){
                         var pref = "0";
                         if((sect/10)>=1) pref="";
                         var sect_id = dist_id+pref+sect;
                         for(var iii=0; iii< this.conts()[i].districts[ii].sectors.length; iii++){
                             if(parseInt(sect_id)==this.conts()[i].districts[ii].sectors[iii].id){
                                 var pref = "0";
                                 if((cell/10)>=1) pref="";
                                 var cell_id = sect_id+pref+cell;
                                 for(var j = 0; j < this.conts()[i].districts[ii].sectors[iii].cells.length; j++){
                                     if(parseInt(cell_id)==this.conts()[i].districts[ii].sectors[iii].cells[j].id){
                                         for(var jj = 0; jj < this.conts()[i].districts[ii].sectors[iii].cells[j].villages.length;jj++){
                                             this.vill.push({
                                                 "name":this.conts()[i].districts[ii].sectors[iii].cells[j].villages[jj].name,
                                                 "id":this.conts()[i].districts[ii].sectors[iii].cells[j].villages[jj].id,
                                                 "idx":jj+1
                                             });
                                             
                                         }
                                         //console.log(this.vill);
                                         break;
                                     }
                                 }
                                 break;
                             }
                         }
                         break;
                     }
                 }
                 break;
             }
         }
     }
     else console.log("No content found");
     return this;
    }
    Options(items){
      var rets = "";
      for(var i = 0; i < items.length; i ++){
         rets +=  `<option value="${items[i].id}">${items[i].name}</option>`;
      }
      return rets;
    }
    List(items,type = "province"){
     var rets = "";
     for(var i = 0; i < items.length; i ++){
        rets +=  `<li><a href="#" class="pip-address-links" data-type="${type}" data-idx="${items[i].idx}" data-id="${items[i].id}">${items[i].name}</a></li>`;
     }
     return rets;
    }
    Address(full_id){
     var provId = parseInt(full_id.substring(0,1));
     var distId = parseInt(full_id.substring(1,3));
     var sectId = parseInt(full_id.substring(3,5));
     var cellId = parseInt(full_id.substring(5,7));
     this.Provinces();
     this.Districts(provId);
     this.Sectors(provId,distId);
     this.Cells(provId,distId,sectId);
     this.Villages(provId,distId,sectId,cellId);
     
     for(var i = 0; i < this.vill.length; i++){
         if(this.vill[i].id==full_id){
             this.village = this.vill[i];
             break;
         }
     }
     for(var i = 0; i < this.cell.length; i++){
         if(this.cell[i].id==full_id.substring(0,7)){
             this.cellure = this.cell[i];
             break;
         }
     }
     for(var i = 0; i < this.sect.length; i++){
         if(this.sect[i].id==full_id.substring(0,5)){
             this.sector = this.sect[i];
             break;
         }
     }
     for(var i = 0; i < this.dist.length; i++){
         if(this.dist[i].id==full_id.substring(0,3)){
             this.district= this.dist[i];
             break;
         }
     }
     for(var i = 0; i < this.prov.length; i++){
         if(this.prov[i].id==provId){
             this.province = this.prov[i];
             break;
         }
     }
     return this;
    }
    // this function use event handler from jQuery so this function will require jQuery libraly
    click(){
      $(".pip-address-links").off("click").click( function(ev){
         ev.preventDefault();
         var data_type = $(this).attr("data-type");
         var data_idx = $(this).attr("data-idx");
         var data_id = $(this).attr("data-id");
         new http("find_address","").loading( function(progress){
 
         }).success( function(responseText){
 
         }).failed( function(responseText){
 
         });
      })
    }
    // the static function just to return default options
    defaultOption(text){
       return `<option value="-1"> -- ${text} -- </option>`;
    }
 }