// Recent Draft modal open close Start..........
document.addEventListener("DOMContentLoaded", function () {
  const orderModal = document.querySelector(".recent-draft-modal-wrapper");
  const openModalBtn = document.getElementById("recent-draftModal");
  const closeModalBtn = document.querySelector(".button-close");

  // Open Modal
  openModalBtn.addEventListener("click", function () {
    orderModal.classList.add("show");
    orderModal.classList.remove("hide");
  });

  // Close Modal
  closeModalBtn.addEventListener("click", function () {
    orderModal.classList.add("hide");
    setTimeout(() => {
      orderModal.classList.remove("show");
      orderModal.classList.remove("hide");
    }, 300);
  });

  // Close Modal when clicking outside of the modal content
  orderModal.addEventListener("click", function (e) {
    if (e.target === orderModal) {
      orderModal.classList.add("hide");
      setTimeout(() => {
        orderModal.classList.remove("show");
        orderModal.classList.remove("hide");
      }, 300);
    }
  });

  const orderItems = document.querySelectorAll(".order-item");
  const orderDetails = document.querySelectorAll(".order-details");
  const orderSummaries = document.querySelectorAll(".order-summary");

  orderItems.forEach((orderItem) => {
    orderItem.addEventListener("click", function () {
      const orderId = orderItem.dataset.order;
      orderItems.forEach((item) => item.classList.remove("active"));
      orderItem.classList.add("active");
      orderDetails.forEach((orderDetail) => {
        if (orderDetail.id === `order-${orderId}`) {
          orderDetail.classList.remove("hidden");
        } else {
          orderDetail.classList.add("hidden");
        }
      });
      orderSummaries.forEach((orderSummary) => {
        if (orderSummary.id === `summary-${orderId}`) {
          orderSummary.classList.remove("hidden");
        } else {
          orderSummary.classList.add("hidden");
        }
      });
    });
  });
});
// Recent draft modal open close End..........



// Recent Draft Table Function Start.............
document.addEventListener("DOMContentLoaded", function () {
  const orderItems = document.querySelectorAll(".order-item");
  const orderDetails = document.querySelectorAll(".order-details");
  const orderSummaries = document.querySelectorAll(".order-summary");

  // Function to calculate and update subtotal
  function calculateSubtotal(orderId) {
    const tableRows = document.querySelectorAll(
      `#order-${orderId} tbody tr`
    );
    let subtotal = 0;

    // Sum up the prices in the table
    tableRows.forEach((row) => {
      const qty = parseInt(row.cells[2].textContent, 10); // Quantity column
      const price = parseFloat(row.cells[3].textContent.replace("$", "")); // Price column
      subtotal += qty * price;
    });

    // Update the subtotal in the summary
    const summarySubtotal = document.querySelector(
      `#summary-${orderId} p strong`
    );
    summarySubtotal.textContent = `Sub-Total: $${subtotal.toFixed(2)}`;

    // Recalculate tax and discount (for demonstration, using static values)
    const discountPercent = orderId === "1" ? 3 : 5; // Example: Discount % changes by order
    const discountAmount = (subtotal * discountPercent) / 100;
    const shippingCost = 20; // Example: Static shipping cost
    const tax = 0; // Example: Static tax rate

    // Update other summary fields
    const summary = document.getElementById(`summary-${orderId}`);
    summary.innerHTML = `
    <p><strong>Sub-Total:</strong> $${subtotal.toFixed(2)}</p>
    <p><strong>Tax (0.0%):</strong> $${tax.toFixed(2)}</p>
    <p><strong>Discount (${discountPercent}%):</strong> $${discountAmount.toFixed(
      2
    )}</p>
    <p><strong>Shipping Cost:</strong> $${shippingCost.toFixed(2)}</p>
  `;
  }

  // Function to show specific order details
  function showOrder(orderId) {
    // Hide all tables and summaries
    orderDetails.forEach((table) => table.classList.add("hidden"));
    orderSummaries.forEach((summary) => summary.classList.add("hidden"));

    // Remove active class from all items
    orderItems.forEach((item) => item.classList.remove("active"));

    // Show the specific table and summary
    document
      .getElementById(`order-${orderId}`)
      .classList.remove("hidden");
    document
      .getElementById(`summary-${orderId}`)
      .classList.remove("hidden");

    // Add active class to the clicked item
    document
      .querySelector(`#order-item-${orderId}`)
      .classList.add("active");

    // Calculate and update subtotal for the selected order
    calculateSubtotal(orderId);
  }

  // Event listener for each order item
  orderItems.forEach((item) => {
    item.addEventListener("click", function () {
      const orderId = this.getAttribute("data-order");
      showOrder(orderId);
    });
  });

  // Show the first order by default
  showOrder(1);
});
// Recent Draft Table Function End.............


// Draft modal Start......
document.addEventListener("DOMContentLoaded", function () {
const orderModal = document.querySelector(".draftmodal-wrapper");
const openModalBtn = document.getElementById("draftModal");
const closeModalBtn = document.querySelector(".close-btn");

// Open Modal
openModalBtn.addEventListener("click", function () {
  orderModal.classList.add("show");
  orderModal.classList.remove("hide");
});

// Close Modal
closeModalBtn.addEventListener("click", function () {
  orderModal.classList.add("hide");
  setTimeout(() => {
    orderModal.classList.remove("show");
    orderModal.classList.remove("hide");
  }, 300);
});

// Close Modal when clicking outside of the modal content
orderModal.addEventListener("click", function (e) {
  if (e.target === orderModal) {
    orderModal.classList.add("hide");
    setTimeout(() => {
      orderModal.classList.remove("show");
      orderModal.classList.remove("hide");
    }, 300);
  }
});
});
// Draft Modal End
