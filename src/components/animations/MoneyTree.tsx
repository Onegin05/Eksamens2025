
import React, { useEffect, useRef } from "react";
import { motion } from "framer-motion";

const MoneyTree = () => {
  const containerRef = useRef<HTMLDivElement>(null);
  
  // Create money leaves that will fall
  const createMoneyLeaf = () => {
    if (!containerRef.current) return;
    
    const leaf = document.createElement("div");
    const size = Math.random() * 20 + 10; // Random size between 10-30px
    
    leaf.className = "absolute bg-green-500 opacity-70 rounded-sm z-10";
    leaf.style.width = `${size}px`;
    leaf.style.height = `${size * 0.5}px`;
    leaf.style.left = `${Math.random() * 100}%`;
    leaf.style.top = "-20px";
    
    // Add $ symbol
    const symbol = document.createElement("span");
    symbol.textContent = "$";
    symbol.className = "text-white text-xs font-bold absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2";
    leaf.appendChild(symbol);
    
    containerRef.current.appendChild(leaf);
    
    // Animate the leaf falling
    const animation = leaf.animate(
      [
        { transform: "translateY(0) rotate(0deg)", opacity: 0.7 },
        { transform: `translateY(${containerRef.current.clientHeight}px) rotate(${Math.random() * 360}deg)`, opacity: 0 }
      ],
      {
        duration: Math.random() * 3000 + 3000, // Between 3-6 seconds
        easing: "cubic-bezier(0.4, 0, 0.2, 1)"
      }
    );
    
    animation.onfinish = () => {
      if (leaf.parentNode) leaf.parentNode.removeChild(leaf);
    };
  };
  
  useEffect(() => {
    // Create leaves at intervals
    const interval = setInterval(() => {
      createMoneyLeaf();
    }, 800);
    
    return () => clearInterval(interval);
  }, []);

  return (
    <div className="relative w-full h-80 overflow-hidden">
      {/* Tree Trunk */}
      <motion.div 
        className="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-8 h-40 bg-gradient-to-t from-green-800 to-green-700 rounded-b-lg z-20"
        initial={{ height: 0 }}
        animate={{ height: 160 }}
        transition={{ duration: 2, ease: "easeOut" }}
      />
      
      {/* Tree Canopy */}
      <motion.div 
        className="absolute bottom-36 left-1/2 transform -translate-x-1/2 w-64 h-64 bg-gradient-to-t from-green-600 to-green-400 rounded-full z-10"
        initial={{ scale: 0, opacity: 0 }}
        animate={{ scale: 1, opacity: 1 }}
        transition={{ duration: 2, delay: 0.5, ease: "easeOut" }}
      />
      
      {/* Money Container */}
      <div ref={containerRef} className="absolute inset-0 z-30" />
    </div>
  );
};

export default MoneyTree;
