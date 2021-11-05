$('#editOfficialModal').on('show.bs.modal', function (e) {
  var opener=e.relatedTarget;
  var id=$(opener).attr('id');
  var fname=$(opener).attr('fname');
  var mname=$(opener).attr('mname');
  var lname=$(opener).attr('lname');
  var nname=$(opener).attr('nname');
  var gender=$(opener).attr('gender');
  var civil_status=$(opener).attr('civil_status');
  var age=$(opener).attr('age');
  var from=$(opener).attr('from');
  var to=$(opener).attr('to');
  var cnumber=$(opener).attr('cnumber');
  var bday=$(opener).attr('bday');
  var bplace=$(opener).attr('bplace');
  var email=$(opener).attr('email');
  var street=$(opener).attr('street');
  var purok=$(opener).attr('purok');
  var citizenship=$(opener).attr('citizenship');
  var religion=$(opener).attr('religion');
  var position=$(opener).attr('position');
  var status=$(opener).attr('status');
  var imgsrc=$(opener).attr('image');
  if(gender === "Male"){
      $('#ma').attr('checked','checked');
  }else if(gender === "Female"){
      $('#fe').attr('checked','checked');
  }
  $('#updateOfficial').find('[name="id"]').val(id);
  $('#updateOfficial').find('[name="fname"]').val(fname);
  $('#updateOfficial').find('[name="mname"]').val(mname);
  $('#updateOfficial').find('[name="lname"]').val(lname);
  $('#updateOfficial').find('[name="nickname"]').val(nname);
  $('#updateOfficial').find('[name="civil_status"]').val(civil_status);
  $('#updateOfficial').find('[name="age"]').val(age);
  $('#updateOfficial').find('[name="from"]').val(from);
  $('#updateOfficial').find('[name="to"]').val(to);
  $('#updateOfficial').find('[name="birthdate"]').val(bday);
  $('#updateOfficial').find('[name="contact_number"]').val(cnumber);
  $('#updateOfficial').find('[name="bplace"]').val(bplace);
  $('#updateOfficial').find('[name="email"]').val(email);
  $('#updateOfficial').find('[name="street"]').val(street);
  $('#updateOfficial').find('[name="purok"]').val(purok);
  $('#updateOfficial').find('[name="citizenship"]').val(citizenship);
  $('#updateOfficial').find('[name="religion"]').val(religion);
  $('#updateOfficial').find('[name="position"]').val(position);
  $('#updateOfficial').find('[name="status"]').val(status);
  $('#image').attr('src',imgsrc);
});

function editFunction() 
{
  var x = document.getElementById("editbirthdate").value;
  const d = new Date();
  const y = new Date(x);
  var result;
  let year = d.getFullYear();
  let year_input = y.getFullYear();

  result = year - year_input;
  document.getElementById("editage").value = result;
}

$('#showModal').on('show.bs.modal', function (e) {
  var opener=e.relatedTarget;
  var id=$(opener).attr('id');

  $('#delete_frm').find('[name="id"]').val(id);
});

$('#showOfficialModal').on('show.bs.modal', function (e) {
  var opener=e.relatedTarget;
  var fname=$(opener).attr('fname');
  var nname=$(opener).attr('nname');
  var gender=$(opener).attr('gender');
  var civil_status=$(opener).attr('civil_status');
  var age=$(opener).attr('age');
  var from=$(opener).attr('from');
  var to=$(opener).attr('to');
  var cnumber=$(opener).attr('cnumber');
  var bday=$(opener).attr('bday');
  var bplace=$(opener).attr('bplace');
  var email=$(opener).attr('email');
  var street=$(opener).attr('street');
  var purok=$(opener).attr('purok');
  var citizenship=$(opener).attr('citizenship');
  var religion=$(opener).attr('religion');
  var position=$(opener).attr('position');
  var status=$(opener).attr('status');
  var imgsrc=$(opener).attr('image');
  
  document.getElementById("fname").innerHTML = fname;
  document.getElementById("nickname").innerHTML = nname;
  document.getElementById("gender").innerHTML = gender;
  document.getElementById("civil_status").innerHTML = civil_status;
  document.getElementById("age").innerHTML = age;
  document.getElementById("from").innerHTML = from;
  document.getElementById("to").innerHTML = to;
  document.getElementById("cnumber").innerHTML = cnumber;
  document.getElementById("bday").innerHTML = bday;
  document.getElementById("bplace").innerHTML = bplace;
  document.getElementById("email").innerHTML = email;
  document.getElementById("street").innerHTML = street;
  document.getElementById("purok").innerHTML = purok;
  document.getElementById("citizenship").innerHTML = citizenship;
  document.getElementById("religion").innerHTML = religion;
  document.getElementById("position").innerHTML = position;
  document.getElementById("status").innerHTML = status;
  $('#image').attr('src',imgsrc);
});