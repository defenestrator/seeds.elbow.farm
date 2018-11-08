<div>
    <h1>Hello, Heisen,</h1>
</div>
<div>
    <h2>you got a new tester request...</h2>
    <div style="border:1px solid gray; padding:12px;">
        <h3>Name: </h3>
        <p>{ $data->name }}</p>
        <h3>Address: </h3>
        <p>{{ $data->message }}</p>
        <h3>Email: </h3>
        <p>{{ $data->email_address }}</p>
        <h3>Journal: </h3>
        <p><a href="{{ $data->journal_link }}">{{ $data->journal_link }}</a></p>
    </div>
    <h2>Write them back, or send them beans, dude.</h2>
</div>
