<?php
echo hash_hmac('POST&https%3A%2F%2Fapi.twitter.com%2F1%2Fstatuses%2Fupdate.json&include_entities%3Dtrue%26oauth_consumer_key%2fzoPKbVZ58h08WSSeNqQMuHV%26oauth_nonce%3DkYjzVBB8Y0ZFabxSWbWovY3uYSQ2pTgmZeNu2VS4cg%26oauth_signature_method%3DHMAC-SHA1%26oauth_timestamp%3D1318622958%26oauth_token%3D370773112-GmHxMAgYyLbNEtIKZeRNFsMKPR9EyMZeS9weJAEb%26oauth_version%3D1.0%26status%3DHello%2520Ladies%2520%252B%2520Gentlemen%252C%2520a%2520signed%2520OAuth%2520request%2521', '2fzoPKbVZ58h08WSSeNqQMuHV&OdDEdReApgtM3iKJKpi0pD7UNH5UPBMTpwwqWIhpQTzH4PqBFO');



echo hash_hmac('ripemd160', 'The quick brown fox jumped over the lazy dog.', 'secret');

echo hash_hmac('POST&https%3A%2F%2Fapi.twitter.com%2F1%2Fstatuses%2Fupdate.json&include_entities%3Dtrue%26oauth_consumer_key%2fzoPKbVZ58h08WSSeNqQMuHV%26oauth_nonce%3DkYjzVBB8Y0ZFabxSWbWovY3uYSQ2pTgmZeNu2VS4cg%26oauth_signature_method%3DHMAC-SHA1%26oauth_timestamp%3D1318622958%26oauth_token%3D370773112-GmHxMAgYyLbNEtIKZeRNFsMKPR9EyMZeS9weJAEb%26oauth_version%3D1.0%26status%3DHello%2520Ladies%2520%252B%2520Gentlemen%252C%2520a%2520signed%2520OAuth%2520request%2521', '2fzoPKbVZ58h08WSSeNqQMuHV&OdDEdReApgtM3iKJKpi0pD7UNH5UPBMTpwwqWIhpQTzH4PqBFO', 'secret');
?>