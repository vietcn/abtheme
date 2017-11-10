/**
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
;( function() {
    "use strict";
    var isIe = /(trident|msie)/i.test( navigator.userAgent );
    if ( isIe && document.getElementById && window.addEventListener ) {
        window.addEventListener( 'hashchange', function() {
            var id = location.hash.substring( 1 ),
                element;
            if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
                return;
            }
            element = document.getElementById( id );
            if ( element ) {
                if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
                    element.tabIndex = -1;
                }
                element.focus();
            }
        }, false );
    }
})();


/*!
 * headroom.js v0.9.4 - Give your page some headroom. Hide your header until you need it
 * Copyright (c) 2017 Nick Williams - http://wicky.nillia.ms/headroom.js
 * License: MIT
 */
!function(a,b){"use strict";"function"==typeof define&&define.amd?define([],b):"object"==typeof exports?module.exports=b():a.Headroom=b()}(this,function(){"use strict";function a(a){this.callback=a,this.ticking=!1}function b(a){return a&&"undefined"!=typeof window&&(a===window||a.nodeType)}function c(a){if(arguments.length<=0)throw new Error("Missing arguments in extend function");var d,e,f=a||{};for(e=1;e<arguments.length;e++){var g=arguments[e]||{};for(d in g)"object"!=typeof f[d]||b(f[d])?f[d]=f[d]||g[d]:f[d]=c(f[d],g[d])}return f}function d(a){return a===Object(a)?a:{down:a,up:a}}function e(a,b){b=c(b,e.options),this.lastKnownScrollY=0,this.elem=a,this.tolerance=d(b.tolerance),this.classes=b.classes,this.offset=b.offset,this.scroller=b.scroller,this.initialised=!1,this.onPin=b.onPin,this.onUnpin=b.onUnpin,this.onTop=b.onTop,this.onNotTop=b.onNotTop,this.onBottom=b.onBottom,this.onNotBottom=b.onNotBottom}var f={bind:!!function(){}.bind,classList:"classList"in document.documentElement,rAF:!!(window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame)};return window.requestAnimationFrame=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame,a.prototype={constructor:a,update:function(){this.callback&&this.callback(),this.ticking=!1},requestTick:function(){this.ticking||(requestAnimationFrame(this.rafCallback||(this.rafCallback=this.update.bind(this))),this.ticking=!0)},handleEvent:function(){this.requestTick()}},e.prototype={constructor:e,init:function(){if(e.cutsTheMustard)return this.debouncer=new a(this.update.bind(this)),this.elem.classList.add(this.classes.initial),setTimeout(this.attachEvent.bind(this),100),this},destroy:function(){var a=this.classes;this.initialised=!1;for(var b in a)a.hasOwnProperty(b)&&this.elem.classList.remove(a[b]);this.scroller.removeEventListener("scroll",this.debouncer,!1)},attachEvent:function(){this.initialised||(this.lastKnownScrollY=this.getScrollY(),this.initialised=!0,this.scroller.addEventListener("scroll",this.debouncer,!1),this.debouncer.handleEvent())},unpin:function(){var a=this.elem.classList,b=this.classes;!a.contains(b.pinned)&&a.contains(b.unpinned)||(a.add(b.unpinned),a.remove(b.pinned),this.onUnpin&&this.onUnpin.call(this))},pin:function(){var a=this.elem.classList,b=this.classes;a.contains(b.unpinned)&&(a.remove(b.unpinned),a.add(b.pinned),this.onPin&&this.onPin.call(this))},top:function(){var a=this.elem.classList,b=this.classes;a.contains(b.top)||(a.add(b.top),a.remove(b.notTop),this.onTop&&this.onTop.call(this))},notTop:function(){var a=this.elem.classList,b=this.classes;a.contains(b.notTop)||(a.add(b.notTop),a.remove(b.top),this.onNotTop&&this.onNotTop.call(this))},bottom:function(){var a=this.elem.classList,b=this.classes;a.contains(b.bottom)||(a.add(b.bottom),a.remove(b.notBottom),this.onBottom&&this.onBottom.call(this))},notBottom:function(){var a=this.elem.classList,b=this.classes;a.contains(b.notBottom)||(a.add(b.notBottom),a.remove(b.bottom),this.onNotBottom&&this.onNotBottom.call(this))},getScrollY:function(){return void 0!==this.scroller.pageYOffset?this.scroller.pageYOffset:void 0!==this.scroller.scrollTop?this.scroller.scrollTop:(document.documentElement||document.body.parentNode||document.body).scrollTop},getViewportHeight:function(){return window.innerHeight||document.documentElement.clientHeight||document.body.clientHeight},getElementPhysicalHeight:function(a){return Math.max(a.offsetHeight,a.clientHeight)},getScrollerPhysicalHeight:function(){return this.scroller===window||this.scroller===document.body?this.getViewportHeight():this.getElementPhysicalHeight(this.scroller)},getDocumentHeight:function(){var a=document.body,b=document.documentElement;return Math.max(a.scrollHeight,b.scrollHeight,a.offsetHeight,b.offsetHeight,a.clientHeight,b.clientHeight)},getElementHeight:function(a){return Math.max(a.scrollHeight,a.offsetHeight,a.clientHeight)},getScrollerHeight:function(){return this.scroller===window||this.scroller===document.body?this.getDocumentHeight():this.getElementHeight(this.scroller)},isOutOfBounds:function(a){var b=a<0,c=a+this.getScrollerPhysicalHeight()>this.getScrollerHeight();return b||c},toleranceExceeded:function(a,b){return Math.abs(a-this.lastKnownScrollY)>=this.tolerance[b]},shouldUnpin:function(a,b){var c=a>this.lastKnownScrollY,d=a>=this.offset;return c&&d&&b},shouldPin:function(a,b){var c=a<this.lastKnownScrollY,d=a<=this.offset;return c&&b||d},update:function(){var a=this.getScrollY(),b=a>this.lastKnownScrollY?"down":"up",c=this.toleranceExceeded(a,b);this.isOutOfBounds(a)||(a<=this.offset?this.top():this.notTop(),a+this.getViewportHeight()>=this.getScrollerHeight()?this.bottom():this.notBottom(),this.shouldUnpin(a,c)?this.unpin():this.shouldPin(a,c)&&this.pin(),this.lastKnownScrollY=a)}},e.options={tolerance:{up:0,down:0},offset:0,scroller:window,classes:{pinned:"headroom--pinned",unpinned:"headroom--unpinned",top:"headroom--top",notTop:"headroom--not-top",bottom:"headroom--bottom",notBottom:"headroom--not-bottom",initial:"headroom"}},e.cutsTheMustard="undefined"!=typeof f&&f.rAF&&f.bind&&f.classList,e});

/**
 * The main theme scripts.
 */
;( function( $ ) {
    "use strict";

    /**
     * Variables used across the app
     */
    var _GadminBarH  = 0,
        _GscrollBarW = 0,
        _GtouchOn    = false,
        _GtouchStartPos = { x: 0, y: 0 },
        _Gtapped = false,
        _GreAttachEventTimeOut = 400,
        EThemeFrameworks = {};

    /**
     * Prevent click event on element if it also have touchend event.
     * @param {Function} callback
     */
    function TouchEndOrClick( el, callback ) {
        this.el = el;
        this.callback = callback;
        this.fired = false;
        this.timeOut = 300;

        this.onTouchEnd = this._touchEndHandler.bind( this );
        this.onClick = this._clickEventHandler.bind( this );
        this.addTouchEndEvent();
        this.addClickEvent();
    }

    TouchEndOrClick.prototype = {
        addTouchEndEvent: function() {
            if ( 'ontouchend' in document ) {
                this.el.addEventListener( 'touchend', this.onTouchEnd, false );
            }
        },
        addClickEvent: function() {
            this.el.addEventListener( 'click', this.onClick, false );
        },
        _touchEndHandler: function( e ) {
            var timeOutFn = this.timeOut;
            if ( _Gtapped ) {
                this.el.removeEventListener( 'click', this.onClick, false );
                this.callback.apply( this.el, arguments );
                clearTimeout( timeOutFn );
                timeOutFn = setTimeout( this.addClickEvent.bind( this ), this.timeOut );
            }
        },
        _clickEventHandler: function( e ) {
            this.callback.apply( this.el, arguments );
        }
    }

    /**
     * Debounce scroll/resize event to make it smoother
     */
    function Debouncer( callback ) {
        this.callback = callback;
        this.ticking = false;
    }

    Debouncer.prototype = {
        /**
         * dispatches the event to the supplied callback
         * @private
         */
        update : function() {
            this.callback && this.callback();
            this.ticking = false;
        },

        /**
         * ensures events don't get stacked
         * @private
         */
        requestTick : function() {
            if ( ! this.ticking ) {
                requestAnimationFrame( this.rafCallback || ( this.rafCallback = this.update.bind( this ) ) );
                this.ticking = true;
            }
        },

        /**
         * Attach this as the event listeners
         */
        handleEvent : function() {
            this.requestTick();
        }
    };


    /**
     * Set global variables
     */
    function fnSetGlobalVars() {
        var adminBar = document.getElementById( 'wpadminbar' );

        if ( adminBar ) {
            _GadminBarH = adminBar.offsetHeight;
        }

        _GscrollBarW = window.innerWidth - $( window ).width();

        /**
         * If browser has touch support then we simulate tap events.
         */
        if ( 'ontouchstart' in document && 'ontouchmove' in document && 'ontouchend' in document ) {
            _GtouchOn = true;

            document.body.addEventListener( 'touchstart', function( e ) {
                _Gtapped = false;
                _GtouchStartPos.x = e.touches[0].pageX;
                _GtouchStartPos.y = e.touches[0].pageY;
            });

            document.body.addEventListener( 'touchmove', function( e ) {
                if ( Math.abs( e.touches[0].pageX - _GtouchStartPos.x ) < 5 && Math.abs( e.touches[0].pageY - _GtouchStartPos.y ) < 5 ) {
                    _Gtapped = true;
                }
            });
        }
    }

    /**
     * Get transitionend event based on current Browser.
     * @return {String}
     */
    function fnWhichTransitionEnd() {
        var el = document.createElement( 'fakeelement' );

        var transitions = {
            "transition"      : "transitionend",
            "OTransition"     : "oTransitionEnd",
            "MozTransition"   : "transitionend",
            "WebkitTransition": "webkitTransitionEnd"
        }

        for ( var t in transitions ) {
            if ( el.style[ t ] !== undefined ) {
                return transitions[ t ];
            }
        }
    }

    /**
     * Wrap everything in a namespace
     */
    var EThemeFramework = {
        /**
         * Aria controls
         */
        fnAriaControls: function() {
            /**
             * Contron click process
             * @param  {Event}   e
             * @param  {Element} control
             */
            var fnProceedControlClick = function( e, control ) {
                var $control = $( control );
                var closeOnly = $control.attr( 'data-efaria-close-only' ),
                    preventScroll = $control.attr( 'data-efaria-prevent-scroll' ),
                    controlledID = $control.attr( 'aria-controls' ),
                    $controlled;

                if ( ! controlledID ) {
                    return;
                }

                $controlled = $( '#' + controlledID );

                if ( ! $controlled.length ) {
                    return;
                }

                closeOnly = ( 'true' == closeOnly ? true : false );
                preventScroll = ( 'true' == preventScroll ? true : false );

                if ( $controlled.hasClass( 'active' ) ) {
                    $control.removeClass( 'active' )
                        .attr( 'aria-expanded', false );
                    $controlled.removeClass( 'active' )
                        .attr( 'aria-expanded', false )
                        .data( 'efariaTopLevel', false );

                    document.body.classList.remove( control.getAttribute( 'aria-controls' ) + '-active' );
                    if ( 'true' == preventScroll ) {
                        document.body.style.overflow = '';
                        document.body.style.paddingRight = '';
                    }
                }
                else if ( ! closeOnly ) {
                    $control.addClass( 'active' )
                        .attr( 'aria-expanded', true );
                    $controlled.addClass( 'active' )
                        .attr( 'aria-expanded', true )
                        .data( 'efariaTopLevel', true );

                    document.body.classList.add( control.getAttribute( 'aria-controls' ) + '-active' );
                    if ( 'true' == preventScroll ) {
                        document.body.style.overflow = 'hidden';
                        document.body.style.paddingRight = _GscrollBarW + 'px';
                    }
                }

                $controlled.trigger( 'eTransitionStart' );
                $controlled.one( fnWhichTransitionEnd(), function() {
                    $controlled.trigger( 'eTransitionCompleted' );
                });
            };

            $( '[data-efelement="ariac"]' ).each( function() {
                var control = this;
                var controlledID = this.getAttribute( 'aria-controls' );

                if ( controlledID ) {
                    new TouchEndOrClick( control, function( e ) {
                        fnProceedControlClick( e, control, controlledID ); 
                    });
                }
            } );

            return new TouchEndOrClick( document.body, function( e ) {
                var _this = this,
                    $target = $( e.target ),
                    $activeAriacs,
                    $activeAriacTargets;

                if ( 'ariac' != $target.attr( 'data-efelement' ) && 'ariactarget' != $target.attr( 'data-efelement' ) ) {
                    $activeAriacs = $( '[data-efelement="ariac"][aria-expanded="true"]' ),
                    $activeAriacTargets = $( '[data-efelement="ariactarget"][aria-expanded="true"]' );

                    $activeAriacTargets.each( function() {
                        if ( e.target != this && ! this.contains( e.target ) ) {
                            $( this ).removeClass( 'active' )
                                .attr( 'aria-expanded', false )
                                .data( 'efariaTopLevel', false );
                        }
                    });

                    $activeAriacs.each( function() {
                        if ( e.target != this && ! this.contains( e.target ) ) {
                            $( this ).removeClass( 'active' )
                                .attr( 'aria-expanded', false );
                        }
                    });
                }
            });
        },
        /**
         * Header
         */
        fnHeader: function() {
            var self       = this,
                $header    = $( '#masthead' ),
                $siteNav   = $( '#site-navigation' ),
                $menu      = $( '#mastmenu' ),
                $menuLinks = $( '#mastmenu li.menu-item > a' ),
                stickyPart, lastWinWidth, debouncer;
            var resizeTimeOut = 100, fnResizeTimeOut = 100;

            $menuLinks.each( function() {
                var _this  = this,
                    $_this = $( this );

                if ( ! $_this.next( 'ul.sub-menu' ).length ) {
                    return;
                }

                $_this.data( 'etouched', false );
                new TouchEndOrClick( _this, function( e ) {
                    var $_parent = $( this ).parent(),
                        $focusedItems = $_parent.siblings( 'li.menu-item.focus' ),
                        $focusedDescendantItems;
                    if ( ! $_this.data( 'etouched' ) ) {
                        $_this.data( 'etouched', true );
                        e.preventDefault();
                    }
                    $_parent.hasClass( 'focus' ) ? $_parent.removeClass( 'focus' ) : $_parent.addClass( 'focus' );
                    if ( $focusedItems.length ) {
                        $focusedItems.each( function() {
                            var $_fthis = $( this );
                            var $a = $_fthis.children( 'a' );
                            $_fthis.removeClass( 'focus' );
                            if ( $a.length ) {
                                $a.data( 'etouched', false );
                            }
                        });

                        $focusedDescendantItems = $focusedItems.find( 'li.menu-item.focus' );
                        $focusedDescendantItems.each( function() {
                            var $_fthis = $( this );
                            var $a = $_fthis.children( 'a' );
                            $_fthis.removeClass( 'focus' );
                            if ( $a.length ) {
                                $a.data( 'etouched', false );
                            }
                        });
                    }
                });
            });

            if ( $header.length ) {
                $header.imagesLoaded( function() {
                    $header.css( { height: $header.outerHeight() } );
                });
                stickyPart = $header[0].querySelector( '[data-efelement="stickyheader"]' );

                if ( stickyPart ) {
                    var headroom = new Headroom( stickyPart, {
                        offset: 480,
                        classes : {
                            // when element is initialised
                            initial : "header-sticky-part",
                            // when scrolling up
                            pinned : "sticked",
                            // when scrolling down
                            unpinned : "unsticked",
                            // when above offset
                            top : "top-reached",
                            // when below offset
                            notTop : "top-unreached",
                            // when at bottom of scoll area
                            bottom : "bottom-reached",
                            // when not at bottom of scroll area
                            notBottom : "bottom-unreached"
                        },
                        onPin : function() {
                            
                        },
                        // callback when unpinned, `this` is headroom object
                        onUnpin : function() {

                        },
                    });

                    headroom.init();
                }

                debouncer = new Debouncer( function() {
                    lastWinWidth = window.innerWidth;
                    $header.css( { height: '' } );

                    clearTimeout( fnResizeTimeOut );
                    fnResizeTimeOut = setTimeout( function() {
                        $header.css( { height: $header.outerHeight() } );
                    }, resizeTimeOut );
                });

                window.addEventListener( 'resize', debouncer, false );
                debouncer.handleEvent();
            }

            new TouchEndOrClick( document.body, function( e ) {
                var $target = $( e.target );
                if ( ! $menu.is( $target ) && ! $target.parents( '#mastmenu' ).length ) {
                    var $focusedItems = $( 'li.menu-item.focus', $menu );
                    $focusedItems.each( function() {
                        var $_fthis = $( this );
                        var $a = $_fthis.children( 'a' );
                        $_fthis.removeClass( 'focus' );
                        if ( $a.length ) {
                            $a.data( 'etouched', false );
                        }
                    });
                }
            });
        },

        /**
         * Back to top button
         */
        fnBackToTop: function() {
            var $els = $( '[data-efelement="totopbutton"]' ),
                lastScrollPos = 0,
                debouncer;

            if ( ! $els.length ) {
                return;
            }

            $els.each( function() {
                new TouchEndOrClick( this, function( e ) {
                    this.blur();
                    $( 'html, body' ).stop().animate( { scrollTop: 0 }, 1500, 'swing' );
                });
            });

            debouncer = new Debouncer( function() {
                lastScrollPos = $( window ).scrollTop();
                if ( lastScrollPos > 480 ) {
                    ! $els.hasClass( 'active' ) && $els.addClass( 'active' );
                }
                else {
                    $els.hasClass( 'active' ) && $els.removeClass( 'active' );
                }
            });

            window.addEventListener( 'scroll', debouncer );
            debouncer.handleEvent();
        },

        /**
         * Kickstart
         */
        _initialized: false,
        fnInit: function() {
            if ( this._initialized ) {
                return false;
            }
            this._initialized = true;
            this.fnAriaControls();
            this.fnHeader();
            this.fnBackToTop();
        },
    };

    document.addEventListener( 'DOMContentLoaded', function() {
        fnSetGlobalVars();
        EThemeFramework.fnInit();
    });
} )( jQuery );