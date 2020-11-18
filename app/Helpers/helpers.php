<?php

function currency_symbol() {
	return '$';
}

function price_format($price) {
	return currency_symbol() . number_format($price, 2);
}