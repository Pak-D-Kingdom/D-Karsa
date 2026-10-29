const fs = require('fs');
const rep = JSON.parse(fs.readFileSync('C:/Users/Fondaendana_/.gemini/antigravity/brain/7e07fa27-ab19-4b20-b120-d2da5688123b/input_data_verification_report.json'));

console.log('Total templates audited:', Object.keys(rep).length);
let count = 0;
for (const [k, v] of Object.entries(rep)) {
  count++;
  console.log(`[${String(count).padStart(2, '0')}] ${k.padEnd(28)} | Category: ${v.category.padEnd(16)} | Passed: ${v.passed ? '✅ YES' : '❌ NO'} | Wiped: ${v.deleted_from_db ? '✅ YES' : '❌ NO'}`);
  for (const [field, snippet] of Object.entries(v.evidence)) {
    console.log(`       • ${field.padEnd(14)}: "${snippet.substring(0, 80)}..."`);
  }
}
