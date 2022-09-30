<script>
    var ProgressBarContainer = document.getElementById('{{ $slug }}');
    var bar = new ProgressBar.Circle(ProgressBarContainer, {
        color: '#aaa',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 4,
        trailWidth: 2,
        easing: 'easeInOut',
        duration: 1400,
        text: {
            autoStyleContainer: false
        },
        from: { color: '#3CCF4E', width: 5 },
        to: { color: '#3CCF4E', width: 5 },
        // Set default step function for all animate calls
        step: function(state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);

            var value = Math.round(circle.value() * 100);
            if (value === 0) {
                circle.setText('0%');
            } else {
                circle.setText('{{ $rating }}' + "%");
            }

        }
        });
    bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
    bar.text.style.fontSize = '0.9rem';
    bar.text.style.color = "white";
    bar.animate('{{ $rating }}'*0.01); 
</script>