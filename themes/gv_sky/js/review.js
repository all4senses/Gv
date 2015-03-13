$$('article').unwrap().wrapAll('<div class="review-posts" />');
$$('.hero-review').prependTo('#main');

var $summary = $$('.field-name-body > .field-items > .field-item > p:nth-child(1)').clone().html().substring(0, 250) + '...';

$$('.hero-review-content-summary').html($summary);