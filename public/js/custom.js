 //$('.cantSelect').on('mousedown', false);
// function callRegister(){
//     window.history.pushState({}, null, 'register');
//     $.ajaxSetup ({
//         cache: false
//     });
//     $('body').load(location.href.split('/').pop());
//
// };
// function callLogin(){
//     window.history.pushState({}, null, 'login');
//     $.ajaxSetup ({
//         cache: false
//     });
//     $('document').load(location.href.split('/').pop());
//
//
// };
// window.onpopstate = function(event) {
//     event?$('body').load(location.href.split('/').pop()):false;
// }
 let indexValueOfStarLink=0;
$(window).resize(function() {
    if ($(window).width() < 720) {
       $('.HideThisWhenMobile').hide();
    }
    else {
        $('.HideThisWhenMobile').show();
    }
});

// function callForgot(){
//     window.history.pushState({}, null, 'Forgot');
//     $.ajaxSetup ({
//         cache: false
//     });
//     $('body').load(location.href.split('/').pop());
//
// };
// function callCreateNewPass(){
//     window.history.pushState({}, null, 'CreateNewPassword');
//     $.ajaxSetup ({
//         cache: false
//     });
//     $('body').load(location.href.split('/').pop());
//
// };
 let currentLinkToShift='';
 let OriginalLinkToShift='';
 let LinkTitleToShift='';
 let secureId='';

$('#virtualDiv').hide();
function shorten(token){
    var hostUrl=$('#hostUrl');
    let confirmationsOfAlert=0;
    if(sessionStorage.getItem('secondtimeshortneragain')===hostUrl.val() && hostUrl.val()!=='') {
        var answer = window.confirm("Do you want to create another short link for this URL ?");
        if (answer) {
            confirmationsOfAlert=1;
        }
        else {
            confirmationsOfAlert=0;
        }
    }
    else {
        sessionStorage.setItem('secondtimeshortneragain',hostUrl.val());
        confirmationsOfAlert=1;
    }
if(hostUrl.val()!==''&& confirmationsOfAlert===1)
    $.ajax({
        url:'sendOriginalLink',
        data:{link:hostUrl.val(),_token:token},
        method:'POST',
        beforeSend:function(){
            $('#shortenMyLinkBtn').text('');
            $('#shortenMyLinkBtn').append('<i style="font-size: 16px" class="fas fa-spinner fa-pulse"></i>');
            $('#shortenMyLinkBtn').prop('disabled', true);
        },
        complete:function(){
            $('#shortenMyLinkBtn').text('');
            $('#shortenMyLinkBtn').text('Shorten my link');
            $('#shortenMyLinkBtn').prop('disabled', false);
        },
        success:function (response) {
            if(response) {
                $('#virtualDiv').show();
                secureId = (response['secureId']);
                $('#virtualLink').val('localhost/fyp/' + response['code']);
                currentLinkToShift = response['code'];
                OriginalLinkToShift = hostUrl.val();
                LinkTitleToShift = response['title'];
            }
        },
        error:function () {
            alert('error');
        }
    })

}
 let virtualLinkEditor= $('#virtualLinkEditor');
function copyVirtualCode(index,data){
    if(index===1){
        let temp=virtualLinkEditor.val();
        virtualLinkEditor.val('localhost/fyp/'+virtualLinkEditor.val());
        data=virtualLinkEditor;
        data.select();
        document.execCommand("copy");
        virtualLinkEditor.val(temp);
        $('#spanforButtonForHideAfterCoping').show();
        setTimeout(function () {
            $('#spanforButtonForHideAfterCoping').hide();
        },1000);
    }
    else{
        data.select();
        document.execCommand("copy");
    }

}

$('#register-form').on('submit',function (e) {
e.preventDefault();
    if($('#pass').val()!=='') {
        if ($('#re_pass').val() === $('#pass').val()) {
            $(".redme").css("color", "black");
            $(".fa-lock ").css("color", "black");
            $('.passwordDoesNotmatch').text('password Matched');
            if ($('#email').val() && $('#re_pass').val() && $('#pass').val()){
                $.ajax({
                    url:'registerNewUser',
                    data:$('#register-form').serialize(),
                    method:'POST',
                    success:function (response) {
                        if(response==='alreadyExists'){
                            $('.emailAlreadyExists').show();

                        }
                        else {
                            window.location.replace('user/links');
                        }
                    },
                    error:function () {
                        alert('error');
                    }
                })
            }

        } else {
            $(".redme").css("color", "red");
            // $("#pass").css("color", "red");
             $(".fa-lock ").css("color", "red");
            $('.passwordDoesNotmatch').show();
        }
    }
    else{
        $(".redme").css("color", "red");
        $(".fa-lock ").css("color", "red");
    }


})
 $('#login-form').on('submit',function (e) {
e.preventDefault();
     $.ajax({
         url:'checkLogin',
         data:$('#login-form').serialize(),
         method:'POST',
         success:function (response) {
             if(response==='notFound'){
                $('.showerror ').show();
             }
             else {
                // if(sessionStorage.getItem('urlForEditFromIndex')!==null){
                     window.location.replace('user/links');
               //  }
                 // else if(sessionStorage.getItem('freeStaticHosting')==='1'){
                 //     window.location.replace('user/hosting');
                 // }
                // else
               //  window.location.replace('user/profile');
             }
         },
         error:function () {
             alert('error');
         }
     })
 })


 if(sessionStorage.getItem('urlForEditFromIndex')!==null)
     virtualLinkEditor.val(sessionStorage.getItem('urlForEditFromIndex'));
 if(sessionStorage.getItem('OriginalTitleForEditFromIndex')!==null)
     $('#TitleLinkEditor').val(sessionStorage.getItem('OriginalTitleForEditFromIndex'));
 if(sessionStorage.getItem('OriginalLinkForEditFromIndex')!==null)
     $('#OriginalLinkAdder').val(sessionStorage.getItem('OriginalLinkForEditFromIndex'));
 if(sessionStorage.getItem('secureIdStorage')!==null)
     $('#secureIdForVirturalLinks').val(sessionStorage.getItem('secureIdStorage'));
 if(sessionStorage.getItem('tempStar')==='1'){
     $('#starThisLinkId').text('');
     $('#starThisLinkId').append('<i class="fas fa-star"></i>');
   //  alert(sessionStorage.getItem('tempStar'))
 }
 else {
     $('#starThisLinkId').text('');
     $('#starThisLinkId').append('<i class="far fa-star"></i>');
 }


 virtualLinkEditor.on('keyup',function () {

 })

 function sendUrlToLogin() {

     sessionStorage.setItem('urlForEditFromIndex',currentLinkToShift);
     sessionStorage.setItem('OriginalTitleForEditFromIndex',LinkTitleToShift);
     sessionStorage.setItem('OriginalLinkForEditFromIndex',OriginalLinkToShift);
     sessionStorage.setItem('secureIdStorage',secureId);
     sessionStorage.setItem('OTF1','1');

     window.location.href='user/links';
 }
 let additonButton=$('.btn-add');
let OriginalLinkToShift1=$('#OriginalLinkAdder');
 function setFormForLinkAddition() {
     $('#mainLinkEditorAdderFormScript').trigger('reset');
    $('.TitleLinkEditor').hide();
    // $('.OriginalLinkAdder').show();
     $('.virtualLinkEditor').hide();
    $('.btn-submit').hide();
    $('label').hide();
     additonButton.show();
     $('#advanceSettingsForLnikCogIcon').hide();
     $('#deleteLinkOne').hide();
     $('#redirectionIcon').hide();
     $('#qrCodeButton').hide();
     $('#starThisLinkId').hide();
     $('#infoIconForStats').hide();
 }
 additonButton.on('click',function (e) {
    e.preventDefault();

     if(OriginalLinkToShift1.val()!=='')
         $.ajax({
             url:'../sendOriginalLink',
             data:{link:OriginalLinkToShift1.val(),_token:$('#_token').val()},
             method:'POST',
             beforeSend: function() {
             additonButton.text('');
             additonButton.append('<i style="font-size: 16px" class="fas fa-spinner fa-pulse"></i>');
             },
             complete: function() {
                 additonButton.text('');
                 additonButton.append('ADD');
             },
             success:function (response) {
                 if (response) {

                 currentLinkToShift = response['code'];
                 OriginalLinkToShift = OriginalLinkToShift1.val();
                 LinkTitleToShift = response['title'];
                 secureId = response['secureId'];
                 $('.TitleLinkEditor').show();
                 $('.virtualLinkEditor').show();
                 $('.btn-submit').show();
                 $('label').show();
                 $('#advanceSettingsForLnikCogIcon').show();
                 $('#deleteLinkOne').show();
                 $('#redirectionIcon').show();
                 $('#qrCodeButton').show();
                 $('#starThisLinkId').show();
                 $('#infoIconForStats').show();
                 additonButton.hide();
                 sessionStorage.setItem('urlForEditFromIndex', currentLinkToShift);
                 sessionStorage.setItem('OriginalTitleForEditFromIndex', LinkTitleToShift);
                 sessionStorage.setItem('OriginalLinkForEditFromIndex', OriginalLinkToShift);
                 sessionStorage.setItem('secureIdStorage', secureId);
                 virtualLinkEditor.val(sessionStorage.getItem('urlForEditFromIndex'));
                 $('#TitleLinkEditor').val(sessionStorage.getItem('OriginalTitleForEditFromIndex'));
                 $('#OriginalLinkAdder').val(sessionStorage.getItem('OriginalLinkForEditFromIndex'));
                 $('#secureIdForVirturalLinks').val(sessionStorage.getItem('secureIdStorage'));

                 fetchLinksDataForTable();
             }
             },
             // error:function () {
             //     alert('error');
             // }
         })
 })
 function addLinkByShiftingLinkFromLogin() {
     $.ajax({
         url:'../addLinkByShiftingLinkFromLogin',
         data:$('#mainLinkEditorAdderFormScript').serialize(),
         method:'POST',
          success:function (response) {
            // $('#secureIdForVirturalLinks').val(response);
             fetchLinksDataForTable();
          },
         // error:function () {
         //     alert('error');
         // }
     })
     sessionStorage.setItem('OTF1','0');
 }
 function fetchLinksDataForTable() {

     $.ajax({
         url:'../fetchLinksDataForTable',
         method:'GET',
         beforeSend:function(){
            // $('#showGifBeforeLoading4').show();
         },

         success:function (response) {
             var tableHeaderRowCount = 0;
             var table = document.getElementById('tableForLinksExtensions');
             var rowCount = table.rows.length;
             for (var i = tableHeaderRowCount; i < rowCount; i++) {
                 table.deleteRow(tableHeaderRowCount);
             }
             let apiCheck;
             let stared;
             for(let i=0;i<=response.length;i++){
                 let clicks=response[i].clicks==='1'?'<b>'+response[i].clicks+'</b> click':'<b>'+response[i].clicks+'</b> clicks';
                 let ClickStyle='<p class="badge badge-success" >'+clicks+'</p>';
                 apiCheck='';
                 stared='';
                 if (response[i]['stared']==='yes') stared='<i class="fas fa-star text-warning ml-2 p-0" data-toggle="tooltip" data-placement="top" title="Stared Link">';
                 if(response[i]['status']==='by api') apiCheck='<p class="badge badge-info text-lg pt-0" data-toggle="tooltip" data-placement="top" title="The links that were added using shortner Api from other websites ">by Api</p>';
                 else if(response[i]['status']==='by host') apiCheck='<p class="badge badge-warning text-lg pt-0" data-toggle="tooltip" data-placement="top" title="The links that were added using Hosting from this websites ">by Hosting</p>';
                 let row='<tr data-toggle="tooltip" data-placement="top" title="'+response[i].title+'"  onclick="rowClickSeTIdDynamically('+response[i]['id']+')">\n' +
                ' <td class="p-4" style="text-overflow: ellipsis;white-space: nowrap; overflow: hidden; max-width: 30ch;"><b>'+response[i].title+' </b><br>localhost/fyp/'+response[i].lvirtual+'</td>' +
                ' <td class="pt-3">'+ClickStyle+stared+'</i><br>'+apiCheck+'</td>\n' +
                ' </tr>';
                 $('#tableForLinksExtensions').append(row);

             }
         },

         // error:function () {
         //     alert('error');
         // }
     })
 }
 virtualLinkEditor.on('keyup',function () {
     //let removeSpaces=virtualLinkEditor.val().replace(/\s/g, '');
    //  alert(removeSpaces);
    $.ajax({
        url:'../checkifExistuserCustomLink',
        data:{removeSpaces:virtualLinkEditor.val(),_token:$('#_token').val()},
        method:'POST',
        success:function (response) {
           if(response===0){
               if(sessionStorage.getItem('urlForEditFromIndex')===virtualLinkEditor.val())
               $('.btn-submit').prop("disabled", false);
               else
               $('.btn-submit').prop("disabled", true);
           }
           else if(response===1){
               $('.btn-submit').prop("disabled", false);
           }

        },
        // error:function () {
        //     alert('error case');
        // }
    })
 })

 let saveBtn=$('.btn-submit');
 saveBtn.on('click',function () {
    $.ajax({
        url:'../user/editLinkDataBySecureId',
        data:$('#mainLinkEditorAdderFormScript').serialize(),
        method:'POST',
        beforeSend:function(){
            saveBtn.text('');
            saveBtn.append('<i style="font-size: 16px" class="fas fa-spinner fa-pulse"></i>');
        },
        complete:function(){
            saveBtn.text('');
            saveBtn.append('save');
        },
        success:function (done) {

               fetchLinksDataForTable();
            virtualLinkEditor.val(done.virtual);
               sessionStorage.setItem('urlForEditFromIndex',done.virtual);
               sessionStorage.setItem('OriginalTitleForEditFromIndex',done.title);

        },
        // error:function () {
        //     alert('error');
        // }
    })
 })
function rowClickSeTIdDynamically(secureIdPram) {
$('#secureIdForVirturalLinks').val(secureIdPram);
$.ajax({
    url:'../user/fetchSpecficRowDataintoTxtField',
    data:{secureIdPram:secureIdPram,_token:$('#_token').val()},
    method:'POST',
    success:function (response) {
        $('.TitleLinkEditor').show();
        $('.virtualLinkEditor').show();
        $('.btn-submit').show();
        $('label').show();
        $('#advanceSettingsForLnikCogIcon').show();
        $('#deleteLinkOne').show();
        $('#redirectionIcon').show();
        $('#qrCodeButton').show();
        $('#starThisLinkId').show();
        if(response.stared==='yes'){
            $('#starThisLinkId').text('');
            $('#starThisLinkId').append('<i class="fas fa-star"></i>');
            indexValueOfStarLink=1;
            sessionStorage.setItem('tempStar','1');
        }
        else{
            $('#starThisLinkId').text('');
            $('#starThisLinkId').append('<i class="far fa-star"></i>');
            indexValueOfStarLink=0;
            sessionStorage.setItem('tempStar','0');
        }
        additonButton.hide();
        $('#infoIconForStats').show();
        OriginalLinkToShift1.val(response.loriginal);
        $('#TitleLinkEditor').val(response.title);
        virtualLinkEditor.val(response.lvirtual);
        sessionStorage.setItem('urlForEditFromIndex',response.lvirtual);
        sessionStorage.setItem('OriginalTitleForEditFromIndex',response.title);
        sessionStorage.setItem('OriginalLinkForEditFromIndex',response.loriginal);
        sessionStorage.setItem('secureIdStorage',response.id);



    },
    error:function () {
        alert('error');
    }
})
}
 let requestToPerformAction1=0;
 let switchforOTP=$('#switch1');
 let passwordFieldForOTP=$('#passwordForOTP');
function setModelForAdvanceSecuritySettings(secureId) {

    $('#advanceSettingForMyLinkForm').trigger('reset');
    $('#secureIdCopy1').val(secureId);
    $.ajax({
    url:'../user/fetchDataFroAdvanceSecurityControl',
    data:{secureIdPrams:secureId,_token:$('#_token').val()},
    method:'POST',
    success:function (r) {
      if(r!==0){
         // alert(parseInt(r['sort']));
          r.reqOTP==='yes'?switchforOTP.prop('checked',true):switchforOTP.prop('checked',false);
         // r.OTP!==''?passwordFieldForOTP.val(r.OTP):'';
          r.statsVisible==='yes'?$('#radio123').prop("checked", true):$('#radio234').prop("checked", true);
          setMySelectForSort(parseInt(r['sort']),);
      }
    },
    error:function () {
        alert('error');
    }
})
}

        function setMySelectForSort(sortIndex){
    let getSelectElement=$('.js-example-basic-singles');
            getSelectElement.select2();

            getSelectElement.select2({
                minimumResultsForSearch: Infinity
            });
            getSelectElement.empty();
            var rowCount = $('#tableForLinksExtensions tr').length;
            if(rowCount>1)
            for(let i=1;i<=rowCount;i++){
               if(i!==sortIndex)
                   getSelectElement.append($('<option>', {
                    value: i,
                    text:  i===1?'position '+i+' (Top most)':'position '+i
                }));
               else {
                   getSelectElement.append($('<option>', {
                       value: '',
                       text:  'Current position '+i
                   }));
               }

            }
            $('.js-example-basic-singles option[value=""]').prop('selected', true)
           // alert(sortIndex)
        }


let showOTP=$('#showOTP');

 passwordFieldForOTP.prop("disabled",true);
 switchforOTP.on('click',function () {
     if(switchforOTP.is(':checked')){
         passwordFieldForOTP.prop("disabled",false);
         requestToPerformAction1=1;
     }
     else{
         passwordFieldForOTP.prop("disabled",true);
         requestToPerformAction1=0;
     }
 })
showOTP.on('click',function () {
        if (passwordFieldForOTP.attr('type') === "password") {
            passwordFieldForOTP.get(0).type = 'text';
        } else {
            passwordFieldForOTP.get(0).type = "password";
        }
})
// let sortyourlink=$('#sortyourlink');
//  sortyourlink.on('change',function () {
//     alert(sortyourlink.val());
//  })
 $('#advanceSettingForMyLinkForm').on('submit',function (e) {
e.preventDefault();
let temp=0;
if(requestToPerformAction1===1){
 if(passwordFieldForOTP.val()!==''){
     temp=1;
 }
 else alert('please enter password');
}
else temp=1;
if(temp===1)
$.ajax({
    url:'../user/advanceSettingForMyLinkForm',
    data:$('#advanceSettingForMyLinkForm').serialize(),
    method:'POST',
    success:function (r) {
      $('.close-btn').click();
        fetchLinksDataForTable();
    },
    error:function () {
        alert('errro');
    }
})


 })
let reqOTPforsecureLinkSinglePageOtpIDpass=$('#reqOTPforsecureLinkSinglePageOtpIDpass');
 reqOTPforsecureLinkSinglePageOtpIDpass.on('keyup',function () {
        $.ajax({
            url:'../user/reqOTPforsecureLinkSinglePageOtpIDpassUrlRequest',
            data:$('#reqOTPforsecureLinkSinglePageOtpIDpassForm').serialize(),
            method:'POST',
            success:function (r) {
             if(r!==0){
                 window.location.reload();
                 window.location.replace(r);
             }
            // else alert('e');
            },
            // error:function () {
            //     alert('errro');
            // }
        })
 })

//------------------------------------hosting-----------------------------------------

 $('#hostingTypicalForm1').on('submit',function (e) {
e.preventDefault();
let projectHostName=$('#projectHostName');
let noofpages=$('#NoOfPages');
if(projectHostName.val()!==''&&noofpages.val()!=='')
$.ajax({
    url:'../user/checkMYhostForHosting',
    data:{name:projectHostName.val(),_token:$('#_token').val()},
    method:'POST',
    success:function (res) {
        if(res===1) {
            $.ajax({
                url:'../user/saveMyNewHostingProject',
                data:$('#hostingTypicalForm1').serialize(),
                method:'POST',
                success:function () {
                   $('.close-btn').click();
                    loadAllMyHostingProjectsAndAppendToDiv();
                },
                error:function () {
                    alert('error');
                }

            })
        }
        else {
            $('#nameAlreadyExists').show();
        }
    },
    error:function () {
        alert('error');
    }
});


 })

 function loadAllMyHostingProjectsAndAppendToDiv() {
     let row=$('#appendAllMyHostedProjectsRow');
    $.ajax({
        url:'../user/getAllMyHostingProjects',
        method:'GET',
        success:function (response) {
            row.empty();
            var BuildInCard='<div class="col-sm-4">\n' +
                '                    <a href="javascript:void(0)" data-toggle="modal" data-target="#createNewHosting">\n' +
                '                            <div class="card text-dark">\n' +
                '                                <div class="card-body">\n' +
                '                                    <h2 class="card-title " style=\'font-family: Arial, Helvetica, sans-serif\'>Create Project</h2><br>\n' +
                '                                    <h3 class="text-right" style=\'font-size: 50px;font-family: Arial, Helvetica, sans-serif\'>\n' +
                '                                        <i class="fa fa-arrow-right"></i>\n' +
                '                                    </h3>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                    </a>\n' +
                '                        </div>';
            row.append(BuildInCard);

            for(let i=response['projects'].length-1;i>=0;i--){
                var card= '<div class="col-sm-4">\n' +
                '                    <a href="../user/hosting/'+response['projects'][i].name+'/file-manager">\n' +
                '                            <div class="card text-light " style="background-color: '+response.color+'     \n">\n' +
                '                                <div class="card-body">\n' +
                '                                    <h2 class="card-title " style=\'font-family: Arial, Helvetica, sans-serif\'>'+response['projects'][i].name+'</h2><br>\n' +
                '                                    <h3 class="text-right" style=\'font-size: 50px;font-family: Arial, Helvetica, sans-serif\'>\n' +
                '                                        <i class="fa fa-arrow-right"></i>\n' +
                '                                    </h3>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                    </a>\n' +
                '                        </div>\n';
                row.append(card);

            }
        }
    })
 }
 let temp=0;
 let selectPAgesInADVHOST=$('#selectPAgesInADVHOST');
 selectPAgesInADVHOST.on('change',function () {
     getAlldataIfSelectChangeForHostingADV();
    // if(sessionStorage.getItem('getPageNo')!=='')
     sessionStorage.setItem('getPageNo',selectPAgesInADVHOST.val());


})
 function getAlldataIfSelectChangeForHostingADV() {
   $.ajax({
       url:'../../user/getAlldataIfSelectChangeForHostingADV',
       data:{data:selectPAgesInADVHOST.val(),_token:$('#_token').val()},
       method:'POST',
       beforeSend:function(){
           $('.la-spinner').show();

       },
       complete:function(){
           $('.la-spinner').hide();

       },
       success:function (response) {
        $('#setCustomNameForEachPAgeADVHOST').val(response.pageName);
        if(response.textHost===''){
            $('.textAreaForHTMLHOST').val('<!DOCTYPE html>\n' +
                '<html lang="en">\n' +
                '<head>\n' +
                '<meta charset="UTF-8">\n' +
                '<meta name="viewport" content="width=device-width, initial-scale=1.0">\n' +
                '<title>Document</title>\n' +
                '</head>\n' +
                '<body>\n' +
                '\n' +
                '</body>\n' +
                '</html>');
        }
        else
           $('.textAreaForHTMLHOST').val(response.textHost);
           if(response.pageName!==null)
           $('#urlforspecficHOSTADV').val('http://localhost/fyp/host/'+response.hostName+'/'+response.pageName);
           else  $('#urlforspecficHOSTADV').val('');
       }
   })
 }
 $('.buttonToSaveAllTextAndNameOfHostADV').on('click',function () {
     let saveHostingData= $('.buttonToSaveAllTextAndNameOfHostADV');
     if($('#setCustomNameForEachPAgeADVHOST').val()==='') $('#setCustomNameForEachPAgeADVHOST').val('page'+Math.floor(Math.random() * 100000));
     $.ajax({
         url:'../../user/ToSaveAllTextAndNameOfHostADV',
         data:{pageNo:selectPAgesInADVHOST.val(),pageName:$('#setCustomNameForEachPAgeADVHOST').val(),textHost:$('.textAreaForHTMLHOST').val(),_token:$('#_token').val()},
         method:'POST',
         beforeSend:function(){
             saveHostingData.text('');
             saveHostingData.append('<i style="font-size: 16px" class="fas fa-spinner fa-pulse"></i>');

         },
         complete:function(){
             saveHostingData.text('');
             saveHostingData.text('Save');
         },
         success:function (response) {
             getAlldataIfSelectChangeForHostingADV()
             //if(response.alreadyExists===1)
            // alert('Page name Already Exists');
             //$('#setCustomNameForEachPAgeADVHOST').val(response.pageName);
         }
     })
 })
function deleteMyEntireADVHOST(name){
    $.confirm({
        title: 'Confirm!',
        content: 'Delete Project?',
        buttons: {
            confirm: function () {
                $.ajax({
                    url:'../../user/deleteMYEntireHOSTADVProject',
                    data:{name:name,_token:$('#_token').val()},
                    method:'POST',
                    success:function () {
                        window.location.replace('../../user/hosting');
                        //getAlldataIfSelectChangeForHostingADV()
                        //$('#setCustomNameForEachPAgeADVHOST').val(response.pageName);
                    },
                    // error:function(){
                    //     alert('error');
                    // }
                })

            },
            cancel: function () {
                //   $.alert('Canceled!');
            },

        }
    });

}

$('#compileAndRunCodeButton').on('click',function () {
    $('.buttonToSaveAllTextAndNameOfHostADV').click();
     window.open($('#urlforspecficHOSTADV').val());
    // window.close();

})


 $('.generateTokenClass').on('click',function () {
   $.get('generateToken',function (data) {
        $('#myApiTokenField').val(data);
   })
 })

 $('#fileUplaodForADVOST').on('change',function(){
     var fileName=$('#fileUplaodForADVOST').val().split('\\').pop().split('.')[0];
     var extenSion=$('#fileUplaodForADVOST').val().split('\\').pop().split('.')[1];
     if(extenSion==='html'){
        $('#fileNameFetchedByFile').val($('#setCustomNameForEachPAgeADVHOST').val()+'[]'+$('#fileUplaodForADVOST').val().split('\\').pop());
     }
     else
$('#fileNameFetchedByFile').val($('#fileUplaodForADVOST').val().split('\\').pop().split('.')[0]);
 });


//  setInterval(function() {
//     fetchLinksDataForTable();
// }, 30000);
$('.refreshBTNforTable').on('click',function () {
    $('.refreshBTNforTable').addClass('fa-spin');
    setTimeout(function(){
        $('.refreshBTNforTable').removeClass('fa-spin');
        fetchLinksDataForTable();
        }, 1000);

})

 function liveMyProject(name) {
     $('.buttonToSaveAllTextAndNameOfHostADV').click();
    if($('#liveMyProject').is(":checked")){
        $checked=1;
    }
    else $checked=0;
    $.post('../../user/liveMyProjectPHP',{checked:$checked,name:name,_token:$('#_token').val()}
    ,function (data) {

        });
 }
 function GetliveMyProject(name) {
     $.post('../../user/GetliveMyProjectPHP',{tellMeAboutCheck:1,name:name,_token:$('#_token').val()}
         ,function (data) {
            if(data.live==='yes'){
                $('#liveMyProject').prop('checked',true);
            }
            else $('#liveMyProject').prop('checked',false);

         });
 }
 function RateAnyTemplate(rating,name) {
    $.post('../user/RateMyTemplate',{_token:$('#templateToken').val(),rating:rating,name:name},function (data) {

            if(rating==1){
                $('#likeThumb'+name).addClass('fa-spin');
            }
            else{
                $('#DislikeThumb'+name).addClass('fa-spin');
            }
        setTimeout(function(){
            $('#likeThumb'+name).removeClass('fa-spin');
            $('#DislikeThumb'+name).removeClass('fa-spin');
            }, 2000);

});
 }

 function downloadAndZipMe(name) {
$.post('../user/zipMe',{_token:$('#templateToken').val(),name:name})
 }

let searchbarVisibility=0;
 function standarizeSearchBarButton() {

    if(searchbarVisibility===0){
        searchbarVisibility=1;
        $('#serBarInput').show();
        $("#serBarInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tableForLinksExtensions tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    }
    else {
        searchbarVisibility=0;
        $('#serBarInput').val('');
        $('#serBarInput').hide();
        fetchLinksDataForTable();
    }
 }

$('.copyMainUrlFromHOSTAdvC').on('click',function () {
    let urlLinkForAdvHostVar=$('#urlforspecficHOSTADV');
    if(urlLinkForAdvHostVar.val()!==''){
        copyVirtualCode(0,urlLinkForAdvHostVar);
    }
    else
        $('.buttonToSaveAllTextAndNameOfHostADV').click();

})
 $('.copySecondaryUrlFromHOSTAdvC').on('click',function () {
    let urlLinkForAdvHostVar=$('#temp2');
    if(urlLinkForAdvHostVar.val()!==''){
        copyVirtualCode(0,urlLinkForAdvHostVar);
    }
    else
        $('.buttonToSaveAllTextAndNameOfHostADV').click();

})

 function addNewPageTOMYADVHOSTJSFun(name) {
     $.confirm({
         title: 'Confirm!',
         content: 'Do you want to add Page ?',
         buttons: {
             confirm: function () {
                 var num = $('#selectPAgesInADVHOST option').length;
                 let newVal=name+'[CuttmyEdge]'+(num+1);
                 //--------------------------
                 $.post(
                     '../../user/addNewPageToMyADVHost',
                     {name:name,_token:$('#_token').val()},
                     function (data,status) {
                         if(status==='success' && data==='1'){
                             selectPAgesInADVHOST.append($('<option>', {
                                 value: newVal,
                                 text: 'Page '+(num+1)
                             }));
                         }
                         checkLengthOfPageCount();

                     }

                 );
             },
             cancel: function () {
               //  $.alert('Canceled!');
             },

         }
     });


 }

 function deletePageFromHostAdvFC(name){
     $.confirm({
         title: 'Confirm!',
         content: 'Delete Page?',
         buttons: {
             confirm: function () {
                let getPageNumber=selectPAgesInADVHOST.val();
                 $.post(
                     '../../user/deletePagePageFromMyADVHost',
                     {data:getPageNumber,_token:$('#_token').val()},
                     function (data,status) {
                         if(status==='success' && data==='1'){
                             selectPAgesInADVHOST.find('option:selected').remove();
                             getAlldataIfSelectChangeForHostingADV();
                             var num = $('#selectPAgesInADVHOST option').length;
                             //alert(num);
                             selectPAgesInADVHOST.find('option').remove();
                             let newVal='';
                             for(let i=1;i<=num;i++){
                                  newVal=name+'[CuttmyEdge]'+i;
                                 selectPAgesInADVHOST.append($('<option>', {
                                     value: newVal,
                                     text: 'Page '+(i)
                                 }));
                             }
                             checkLengthOfPageCount();
                         }

                     }

                 );

             },
             cancel: function () {
              //   $.alert('Canceled!');
             },

         }
     });
 };
 checkLengthOfPageCount();
 function checkLengthOfPageCount() {
        if($('#selectPAgesInADVHOST option').length===1){
            $('.deletePageFromHostAdvC').hide();
        }
        else
            $('.deletePageFromHostAdvC').show();
 }

 $('.addpagelinktomylinkmanager').on('click',function () {
     $('.buttonToSaveAllTextAndNameOfHostADV').click();
     $('.la-spinner').show();
     setTimeout(function(){
         $('.la-spinner').show();
         $.confirm({
         title: 'Confirm!',
         content: 'Are you sure to add this link to your links collections?',
         buttons: {
             confirm: function () {
                 //--------------------------
                 $.post(
                     '../../user/addHostingPageLinkToLinkManager',
                     {url:$('#urlforspecficHOSTADV').val(),_token:$('#_token').val()},
                     function (data,status) {
                         $('.la-spinner').hide();
                   // alert(data);

                     }

                 );
             },
             cancel: function () {
                 $('.la-spinner').hide();
                 //  $.alert('Canceled!');
             },

         }
     });
     }, 2000);
 })

 $('#deleteLinkOne').on('click',function () {
     $.confirm({
         title: 'Confirm!',
         content: 'Are you sure to delete this link?',
         buttons: {
             confirm: function () {
                 //--------------------------
                 $.post(
                     '../user/deleteMyPersonalLinkFromLinkManager',
                     {id:$('#secureIdForVirturalLinks').val(),_token:$('#_token').val()},
                     function (data,status) {
                         setFormForLinkAddition();
                         sessionStorage.clear();
                         fetchLinksDataForTable();
                     }

                 );
             },
             cancel: function () {
                 //$('.la-spinner').hide();
                 //  $.alert('Canceled!');
             },

         }
     });
 })

 $('#starThisLinkId').on('click',function () {
    // if($('#starThisLinkId').text()==='<i class="far fa-star"></i>'){
       //  alert($('#starThisLinkId').val());
   //  }
     let starValue='';
     if(indexValueOfStarLink===1){
         starValue='no';
         indexValueOfStarLink=0;

         sessionStorage.setItem('tempStar','0');
     }
     else {
         indexValueOfStarLink=1;
         starValue='yes';

         sessionStorage.setItem('tempStar','1');
     }
     $.post(
         '../user/starMyLink',
         {id:$('#secureIdForVirturalLinks').val(),starValue:starValue,_token:$('#_token').val()},
         function (data,status) {
             if(data==='1'){
                 fetchLinksDataForTable();
                 if(indexValueOfStarLink===0){
                     $('#starThisLinkId').text('');
                     $('#starThisLinkId').append('<i class="far fa-star"></i>');
                 }
                 else {
                     $('#starThisLinkId').text('');
                     $('#starThisLinkId').append('<i class="fas fa-star"></i>');
                 }
                // alert('stared');

             }

         }

     );
 })


 function getQrCode() {

     if(sessionStorage.getItem('urlForEditFromIndex')!=='') {
         let src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&bgcolor=292b2c&data=http://localhost/fyp/"+sessionStorage.getItem('urlForEditFromIndex');
        $('#qrCodeDiv').html('<img src='+src+' />');
     }
 }

 function downlaodstatsasPDF(link){
        let btn= $('#downlaodstatsasPDF');
        $.ajax({
            url:'https://v2.convertapi.com/convert/web/to/pdf?Secret=ATTAQADoDMwZXAYc',
            method:'POST',
            data:{
            Url:link,
             StoreFile:true
            },
            beforeSend:function () {
                btn.text('');
                btn.prop('disabled', true);
                btn.append('<i style="font-size: 16px" class="fas fa-spinner fa-pulse"></i>');

            },
            complete:function () {
                btn.text('');
                btn.prop('disabled', false);
                btn.append('Download stats as pdf');

            },
            success:function (response) {
                let url=(response.Files[0].Url);
                window.location.href=url;
            },
            error:function () {

            }

        })
 }

 function PublishMyProject(name) {
        alert(name);
 }
