
var server = sinon.fakeServer.create();
server.respondWith('POST', 'login', [
    200,
    {'Content-Type': 'application/json'},
    '{"name":"Tim","role":"admin"}'
]);