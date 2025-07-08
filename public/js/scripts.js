// Convert image URL to base64
    function getBase64FromImageUrl(url, callback) {
        const img = new Image();
        img.crossOrigin = 'anonymous';
        img.onload = function () {
            const canvas = document.createElement('canvas');
            canvas.width = img.width;
            canvas.height = img.height;
            const ctx = canvas.getContext('2d');
            ctx.drawImage(img, 0, 0);
            const dataURL = canvas.toDataURL('image/png');
            callback(dataURL);
        };
        img.onerror = function () {
            console.error("Failed to load image from URL: " + url);
            callback(null); // fallback
        };
        img.src = url;
    }

    $(document).ready(function () {
        // Initialize Thaana keyboard
        $('.thaana').thaana({
            keyboard: 'phonetic'
        });

        // Initialize DataTable with buttons disabled (custom PDF button used)
        let table = $('#bidsTable').DataTable({
            language: {
                search: "Search:"
            },
            pageLength: 10,
            lengthChange: false,
            dom: 'Bfrtip',
            buttons: []
        });

        // Initialize other DataTables except #bidsTable
        $('.datatable').not('#bidsTable').each(function () {
            $(this).DataTable({
                language: {
                    search: "Search:"
                },
                pageLength: 10,
                lengthChange: false
            });
        });

        // PDF download button click
        $('#downloadPDF').click(function () {
            const currentDate = new Date().toLocaleDateString();

            getBase64FromImageUrl(logoUrl, function (logoBase64) {
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF('l', 'mm', 'a4'); // Portrait A4

                // Add logo if available
                if (logoBase64) {
                    doc.addImage(logoBase64, 'PNG', 220, 15, 60, 9);
                }

                // Add title
                doc.setFontSize(16);
                doc.text('Registration List', 20, 20);

                // Add bid info
                doc.setFontSize(10);
                doc.text('Bid: ' + bidDescription + '. Iulaan No. ' + iulaanNumber, 20, 26);

                // Add date note
                doc.setFontSize(6);
                doc.text('This is an auto generated sheet and does not require a signature. Date: ' + currentDate, 20, 33);

                // Prepare table headers and body
                const headers = [];
                const tableData = [];

                $('#bidsTable thead tr th').each(function () {
                    headers.push($(this).text());
                });

                table.rows().every(function () {
                    const rowData = [];
                    const data = this.data();
                    for (let i = 0; i < data.length; i++) {
                        const cellText = $('<div>').html(data[i]).text();
                        rowData.push(cellText);
                    }
                    rowData.push(""); // Add empty "Sign" cell
                    tableData.push(rowData);
                });

                // Generate table in PDF
                doc.autoTable({
                    head: [headers],
                    body: tableData,
                    startY: 40,
                    styles: {
                        fontSize: 8,
                        cellPadding: 1.5,
                        overflow: 'linebreak',
                        cellWidth: 'wrap'
                    },
                    headStyles: {
                        fillColor: [41, 128, 185],
                        textColor: 255,
                        fontStyle: 'bold',
                        fontSize: 8,
                        halign: 'center',
                        minCellHeight: 8
                    },
                    alternateRowStyles: {
                        fillColor: [255, 255, 255]
                    },
                    columnStyles: {
                        0: { halign: 'center', cellWidth: 8, minCellHeight: 10 },  // #
                        1: { cellWidth: 15 },                  // Type
                        2: { cellWidth: 40 },                  // Full Name
                        3: { cellWidth: 50 },                  // Email
                        4: { cellWidth: 30 },                  // Phone
                        5: { cellWidth: 60 },                  // Business Name
                        6: { cellWidth: 55 },                  // Registration Number
                    },
                    margin: { top: 40, right: 20, bottom: 20, left: 20 },
                    tableWidth: 'auto',
                    theme: 'grid'
                });

                // Save PDF
                doc.save('registration-list-' + currentDate.replace(/\//g, '-') + '.pdf');
            });
        });
    });


        