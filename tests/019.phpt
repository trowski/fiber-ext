--TEST--
tests Fiber for throw exception
--SKIPIF--
<?php
if (!extension_loaded('fiber')) {
    echo 'skip';
}
?>
--FILE--
<?php
$f = new Fiber(function () {
    try {
        $a = Fiber::yield();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
});
$f->resume();
$f->throw(new Exception("foo"));
?>
--EXPECTF--
foo
