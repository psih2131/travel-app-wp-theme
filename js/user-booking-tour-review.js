( function () {
	'use strict';

	var forms = document.querySelectorAll( '.js-user-booking-review-form' );
	if ( ! forms.length ) {
		return;
	}

	function setStarState( group, value ) {
		var hidden = group.querySelector( '.js-user-booking-review-rating' );
		var stars  = group.querySelectorAll( '.js-user-booking-review-star' );
		var v      = value === 0 || value === null || value === undefined ? 0 : parseInt( value, 10 );
		if ( isNaN( v ) || v < 0 || v > 5 ) {
			v = 0;
		}
		if ( hidden ) {
			hidden.value = v > 0 ? String( v ) : '';
		}
		if ( group.classList.contains( 'js-user-booking-review-stars' ) || group.getAttribute( 'data-rating' ) !== null ) {
			group.setAttribute( 'data-rating', v > 0 ? String( v ) : '0' );
		}
		for ( var i = 0; i < stars.length; i++ ) {
			var sv = parseInt( stars[ i ].getAttribute( 'data-value' ), 10 );
			var on = v > 0 && ! isNaN( sv ) && sv <= v;
			stars[ i ].setAttribute( 'aria-pressed', on ? 'true' : 'false' );
			stars[ i ].classList.toggle( 'is-active', on );
		}
	}

	forms.forEach( function ( form ) {
		var group = form.querySelector( '.js-user-booking-review-stars' );
		var err   = form.querySelector( '.js-user-booking-review-error' );
		if ( ! group ) {
			return;
		}

		group.addEventListener( 'click', function ( e ) {
			var b = e.target.closest( '.js-user-booking-review-star' );
			if ( ! b || ! group.contains( b ) ) {
				return;
			}
			var n = parseInt( b.getAttribute( 'data-value' ), 10 );
			var cur = group.getAttribute( 'data-rating' );
			var curN = cur ? parseInt( cur, 10 ) : 0;
			if ( ! isNaN( n ) && n === curN ) {
				setStarState( group, 0 );
			} else {
				setStarState( group, n );
			}
			if ( err ) {
				err.hidden = true;
			}
		} );
		setStarState( group, 0 );

		form.addEventListener( 'submit', function ( e ) {
			var hidden = form.querySelector( '.js-user-booking-review-rating' );
			var v = hidden && hidden.value ? parseInt( hidden.value, 10 ) : 0;
			if ( v < 1 || v > 5 ) {
				e.preventDefault();
				var msg = err && err.getAttribute( 'data-msg-rating' ) ? err.getAttribute( 'data-msg-rating' ) : '';
				if ( err ) {
					err.textContent = msg;
					err.hidden = ! msg;
				}
			}
		} );
	} );
} )();
