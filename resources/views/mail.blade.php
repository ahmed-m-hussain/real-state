<!DOCTYPE html>
<html>
<body>

<h1>Project</h1>

<p>
    Name: {{$data['name']}}
</p>
<p>
    Surname: {{$data['surname']}}
</p>
<p>
    Phone: {{$data['phone']}}
</p>
<p>
    Email: {{$data['email']}}
</p>
@if(isset($data['contactedPhone']) && $data['contactedPhone'] == true)
    <p>I want to be contacted per email</p>
 @endif
@if(isset($data['contactedEmail']) && $data['contactedEmail'] == true)
    <p>I want to be contacted per phone</p>
@endif
<p>
    Address: {{$data['address']}}
</p>

</body>
</html>
